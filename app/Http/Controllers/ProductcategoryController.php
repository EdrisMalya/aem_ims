<?php

namespace App\Http\Controllers;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductcategoryRequest;
use App\Http\Resources\ProductcategoryResource;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ProductcategoryController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('product-categories-access');
        $productcategorys = Productcategory::query();
        $datatable = new DatatableBuilder($productcategorys, $request, []);
        return Inertia::render('ProductManagement/ProductCategory/ProductCategoryIndex',[
            'productcategorys' => ProductcategoryResource::collection($datatable->build()),
            'active' => 'product-categories'
        ]);
    }

    public function store($lang, ProductcategoryRequest $request ){
        $this->allowed('product-categories-create-category');
        $data = $request->validated();
        if($request->file('logo')){
            $request->validate(['logo' => ['required', 'file', 'image', 'max:5000']]);
            $data['logo'] = asset('storage/'.$request->file('logo')->store('productcategory_logos','public'));
        }
        Productcategory::query()->create($data);
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }
    public function update($lang, ProductcategoryRequest $request, $productcategory){
        $this->allowed('product-categories-edit-category');
        try {
            $productcategory = Productcategory::query()->findOrFail(decrypt($productcategory));
            $data = $request->validated();
            if($request->file('logo')){
                HelperController::removeFile($productcategory->logo, 'url');
                $data['logo'] = asset('storage/'.$request->file('logo')->store('productcategory_logos','public'));
            }else{
                $data['logo'] = $productcategory->logo;
            }
            $productcategory->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::info($exception);
            abort(404);
        }
    }

    public function destroy($lang, Request $request, $productcategory){
        $this->allowed('product-categories-delete-category');
        try {
            $productcategory = Productcategory::query()->findOrFail(decrypt($productcategory));
            if($productcategory->logo){
                HelperController::removeFile($productcategory->logo, 'url');
            }
            $productcategory->delete();
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }

}
