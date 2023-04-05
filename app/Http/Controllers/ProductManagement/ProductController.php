<?php

namespace App\Http\Controllers\ProductManagement;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\BaseunitResource;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ProductcategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SupplierResource;
use App\Http\Resources\WarehouseResource;
use App\Models\BaseUnit;
use App\Models\Brand;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('product-access');
        #dd($request->all());
        $products = Product::query()->with(['brand', 'unit', 'category'])->where('is_deleted', false);
        if($request->has('filter')){
            $from_date = $request->get('from_date');
            $to_date = $request->get('to_date');
            $categories = json_decode($request->get('categories'));
            $brands = json_decode($request->get('brands'));
            $units = json_decode($request->get('units'));
            $show_deleted = $request->get('show_deleted') == '1';
            if($request->get('from_date') != null && $request->get('to_date') != null){
                $products = $products->whereBetween('created_at', [$from_date, $to_date]);
            }
            if(count($categories) > 0){
                $categories = collect($categories)->map(fn($item)=>$item->value)->toArray();
                $products = $products->whereIn('product_category_id', $categories);
            }
            if(count($brands) > 0){
                $brands = collect($brands)->map(fn($item)=>$item->value)->toArray();
                $products = $products->whereIn('brand_id', $brands);
            }
            if(count($units) > 0){
                $units = collect($units)->map(fn($item)=>$item->value)->toArray();
                $products = $products->whereIn('product_unit_id', $units);
            }
            if($show_deleted){
                $products = $products->where('is_deleted', true);
            }
        }
        $datatable = new DatatableBuilder($products, $request, ['name', 'code']);
        return Inertia::render('ProductManagement/Products/ProductIndex', [
            'active' => 'products',
            'products' => ProductResource::collection($datatable->build()),
            'filters' => $request->all()
        ]);
    }

    public function create($lang, Request $request){
        $this->allowed('product-add-product');
        return Inertia::render('ProductManagement/Products/ProductForm', [
            'active' => 'products',
            'categories' => ProductcategoryResource::collection(ProductCategory::query()->get()),
            'brand' => BrandResource::collection(Brand::query()->get()),
            'unites' => BaseunitResource::collection(BaseUnit::query()->get()),
            'warehouse' => WarehouseResource::collection(Warehouse::query()->get()),
            'suppliers' => SupplierResource::collection(Supplier::query()->get())
        ]);
    }

    public function store($lang, ProductRequest $request ){
        $this->allowed('product-add-product');
        $data = $request->validated();
        $warehouse = HelperController::isEncrypted($request->get('warehouse')['value']);
        $supplier = HelperController::isEncrypted($request->get('supplier')['value']);
        $product_quantity = $request->get('product_quantity');
        $stock_status = $request->get('stock_status');
        $product = Product::query()->create($data);
        Inventory::query()->create([
            'warehouse_id' => $warehouse,
            'supplier_id' => $supplier,
            'product_id' => $product->id,
            'quantity' => $product_quantity,
            'added_date' => now(),
            'status' => $stock_status
        ]);
        return redirect()->to(route('product.index', ['lang' => $lang]))
            ->with(['message' => translate('Product added successfully'), 'type' => 'success']);
    }

    public function show($lang, Request $request, $product ){
        $this->allowed('product-view-product-details');
        try {
            $product = Product::query()->with(['category', 'brand', 'unit', 'inventory'])
                ->where('is_deleted', false)
                ->find(decrypt($product));
            return Inertia::render('ProductManagement/Products/ProductDetails', [
                'active' => 'products',
                'product' => new ProductResource($product)
            ]);

        }catch (\Exception $e){
            Log::error($e);
            abort(404);
        }
    }

    public function edit($lang, Request $request, $product){
        $this->allowed('product-edit-product');
        try {
            $product = Product::query()->with(['category', 'brand', 'unit', 'sale_unit', 'purchase_unit'])->findOrFail(decrypt($product));
            return Inertia::render('ProductManagement/Products/ProductForm', [
                'product' => new ProductResource($product),
                'active' => 'products',
                'categories' => ProductcategoryResource::collection(ProductCategory::query()->get()),
                'brand' => BrandResource::collection(Brand::query()->get()),
                'unites' => BaseunitResource::collection(BaseUnit::query()->get()),
                'warehouse' => WarehouseResource::collection(Warehouse::query()->get()),
                'suppliers' => SupplierResource::collection(Supplier::query()->get()),
                'edit_form' => true
            ]);
        }
        catch (\Exception $e){
            Log::error($e);
            abort(404);
        }
    }

    public function update($lang, ProductUpdateRequest $request, $product){
        $this->allowed('product-edit-product');
        $data = $request->validated();
        $product = Product::query()->findOrFail(decrypt($product));
        if($request->file('image')){
            $request->validate([
                'image' => ['required', 'file', 'image', 'max:5000']
            ]);
            $data['image'] = asset('storage/'.$request->file('image')->store('product_images','public'));
            if($product->image){
                HelperController::removeFile($product->image, 'url');
            }
        }
        else{
            $data['image'] = $product->image;
        }
        $product->update($data);
        return redirect()->to(route('product.index', ['lang'=> $lang ]))->with(['message' => translate('Updated successfully'), 'type' => 'success']);
    }

    public function destroy($lang, Request $request, $product){
        $this->allowed('product-delete-product');
        try {
            $product = Product::query()->find(decrypt($product));
            $product->update([
                'is_deleted' => true
            ]);
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }
}
