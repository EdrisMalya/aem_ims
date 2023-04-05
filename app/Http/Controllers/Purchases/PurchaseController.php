<?php

namespace App\Http\Controllers\Purchases;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Http\Requests\PurhcaseRequest;
use App\Http\Resources\PaymentTypeResource;
use App\Http\Resources\PurchaseResource;
use App\Http\Resources\SupplierResource;
use App\Http\Resources\WarehouseResource;
use App\Models\AssignedProducts;
use App\Models\Inventory;
use App\Models\PaymentType;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\SystemSetting;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PurchaseController extends Controller
{
    public function index($lang, Request $request ){
        $this->allowed('purchase-access');
        $purchases = Purchase::query()->with(['supplier', 'warehouse']);
        if($request->has('fetch_purchase_reference')){
            if($request->get('search') == ''){
                return [];
            }
            return PurchaseResource::collection(
                $purchases->where('id', 'LIKE', '%'.$request->get('search').'%')->get()
            );
        }
        if($request->has('filter')){
            $filters = [
                'filter' => $request->get('filter'),
                'date_from' => $request->get('date_from'),
                'date_to' => $request->get('date_to'),
                'status' => $request->get('status'),
                'warehouse' => $request->get('warehouse'),
                'supplier' => $request->get('supplier'),
                'payment_type' => $request->get('payment_type'),
                'due' => $request->get('due'),
            ];
            if($filters['date_from'] != null && $filters['date_to'] != null){
                $purchases = $purchases->whereBetween('purchase_date', [$filters['date_from'], $filters['date_to']]);
            }
            if($filters['status']!=null){
                $purchases = $purchases->where('status', $filters['status']);
            }
            if($filters['warehouse'] != null){
                $purchases = $purchases->where('warehouse_id', $filters['warehouse']['value']);
            }
            if($filters['supplier'] != null){
                $purchases = $purchases->where('supplier_id', $filters['supplier']['value']);
            }
            if($filters['payment_type'] != null){
                $purchases = $purchases->where('payment_type_id', $filters['payment_type']['value']);
            }
            if($filters['due'] != null){
                $purchases = $purchases->where('due', '>', 0);
            }
        }else{
            $filters = [];
        }
        if($request->has('fetch_references')){
            return [
                [
                    'label' => 'Test',
                    'value' => 1
                ],
                [
                    'label' => 'Test2',
                    'value' => 2
                ]
            ];
        }
        $datatable = new DatatableBuilder($purchases, $request);
        return Inertia::render('PurchaseManagement/Purchase/PurchaseIndex', [
            'active' => 'purchase',
            'purchases' => PurchaseResource::collection($datatable->build()),
            'filters' => $filters
        ]);
    }

    public function create($lang, Request $request ){
        $this->allowed('purchase-create-purchase');
        return Inertia::render('PurchaseManagement/Purchase/PurchaseForm',[
            'warehouses' => WarehouseResource::collection(Warehouse::query()->where('status', true)->get()),
            'suppliers' => SupplierResource::collection(Supplier::query()->get()),
            'payment_types' => PaymentTypeResource::collection(PaymentType::query()->get()),
            'active' => 'purchase'
        ]);
    }

    public function store($lang, PurhcaseRequest $request){
        $this->allowed('purchase-create-purchase');
        $data = $request->validated();
        $products = $request->get('products');
        $data['currency_id'] = SystemSetting::query()->first()->currency_id;
        \DB::beginTransaction();
        try {
            $purchase = Purchase::query()->create($data);
            foreach ($products as $product){
                if($data['status'] == 'received'){
                    $this->updateInventory($data, $product);
                }
                AssignedProducts::query()->create([
                    'type' => 'purchase',
                    'model_id' => $purchase->id,
                    'product_id' => HelperController::isEncrypted($product['id']),
                    'amount_type' => 'cost',
                    'product_amount' => $product['int_cost'],
                    'base_unit_id' => HelperController::isEncrypted($product['purchase_unit']['id']),
                    'quantity' => $product['qty'],
                    'discount_type' => $product['discount_type'],
                    'discount' => $product['discount']
                ]);
            }
            \DB::commit();
        }catch (\Exception $exception){
            \DB::rollBack();
            \Log::error($exception);
            return back()->with(['message' => translate('Something went wrong'), 'type' => 'error']);
        }
        return redirect()->to(route('purchase.index', ['lang' => $lang]))->with(['message' => translate('Purchase was successfully')]);
    }

    public function show($lang, Request $request, $purchase ){
        try {
            $purchase = Purchase::query()->with(['supplier', 'warehouse', 'assigned_products.product.currency', 'payment_type', 'currency'])->find(decrypt($purchase));
            return Inertia::render('PurchaseManagement/Purchase/PurchaseDetails', [
                'active' => 'purchase',
                'purchase' => new PurchaseResource($purchase)
            ]);
        }catch (\Exception $exception){
            \Log::error($exception);
            abort(404);
        }
    }
    public function edit($lang, Request $request, $purchase){
        try {
            $purchase = Purchase::query()->with(['warehouse', 'supplier', 'assigned_products.product.currency', 'assigned_products.product.purchase_unit', 'payment_type'])->find(decrypt($purchase));
            if($purchase->status != 'received' or $purchase->due != 0){
                return Inertia::render('PurchaseManagement/Purchase/PurchaseForm', [
                    'active' => 'purchase',
                    'purchase' => new PurchaseResource($purchase),
                    'warehouses' => WarehouseResource::collection(Warehouse::query()->where('status', true)->get()),
                    'suppliers' => SupplierResource::collection(Supplier::query()->get()),
                    'payment_types' => PaymentTypeResource::collection(PaymentType::query()->get()),
                    'only_change_due' => ($purchase->status == 'received' && $purchase->due != 0)
                ]);
            }else{
                return back()->with(['message' => translate('Purchase products already received and cannot be deleted'), 'type' => 'warning']);
            }
        }
        catch (\Exception $exception){
            \Log::error($exception);
            abort(404);
        }
    }

    public function update($lang, PurhcaseRequest $request, $purchase){
        $purchase = Purchase::query()->find($this->findId($purchase));
        $data = $request->validated();
        $products = $request->get('products');
        if($request->get('only_change_due')){
            $purchase->update([
                'due' => $data['due'],
                'grand_total' => $data['grand_total']
            ]);
            return redirect()->to(route('purchase.index', ['lang' => $lang]))
                ->with(['message' => translate('Updated successfully'), 'type' => 'success', 'flash_id' => 'PU_'.$purchase->id, 'flash_column' => 'reference']);
        }
        \DB::beginTransaction();
        try {
            $purchase->update($data);
            AssignedProducts::query()->where([
                ['type', '=', 'purchase'],
                ['model_id', '=', $purchase->id],
            ])->delete();
            foreach ($products as $product){
                if($data['status'] == 'received'){
                    $this->updateInventory($data, $product);
                }
                AssignedProducts::query()->create([
                    'type' => 'purchase',
                    'model_id' => $purchase->id,
                    'product_id' => HelperController::isEncrypted($product['id']),
                    'amount_type' => 'cost',
                    'product_amount' => $product['int_cost'],
                    'base_unit_id' => HelperController::isEncrypted($product['purchase_unit']['id']),
                    'quantity' => $product['qty'],
                    'discount_type' => $product['discount_type'],
                    'discount' => $product['discount']
                ]);
            }
            \DB::commit();
            return redirect()->to(route('purchase.index', ['lang' => $lang]))
                ->with(['message' => translate('Updated successfully'), 'type' => 'success', 'flash_id' => 'PU_'.$purchase->id, 'flash_column' => 'reference']);
        }catch (\Exception $exception){
            \Log::error($exception);
            \DB::rollBack();
            return back()->with(['message' => translate('Something went wrong'), 'type' => 'error']);
        }
    }

    public function destroy($lang, Request $request, $purchase ){
        $purchase = Purchase::query()->findOrFail($this->findId($purchase));
        if($purchase->status == 'received'){
            return back()->with(['message' => translate('Received purchases cannot be deleted'), 'type' => 'error']);
        }
        AssignedProducts::query()->where([
            ['type', '=', 'purchase'],
            ['model_id', '=', $purchase->id],
        ])->delete();
        $status = $purchase->status;
        $purchase->delete();
        return back()->with(['message' => translate(ucfirst($status.' purchase deleted successfully')), 'type' => 'success']);
    }

    public function updateInventory($data, $product){
        $inventory = Inventory::query()->where([
            ['warehouse_id', '=', $data['warehouse_id']],
            ['product_id', '=', HelperController::isEncrypted($product['id'])],
            ['supplier_id', '=', $data['supplier_id']],
            ['base_unit_id', '=', HelperController::isEncrypted($product['purchase_unit']['id'])],
        ]);
        if($inventory->exists()){
            $inventory->update([
                'quantity' => $inventory->first()->quantity + $product['qty'],
            ]);
        }else{
            Inventory::query()->create([
                'warehouse_id' => $data['warehouse_id'],
                'supplier_id' => $data['supplier_id'],
                'product_id' => HelperController::isEncrypted($product['id']),
                'base_unit_id' => HelperController::isEncrypted($product['purchase_unit']['id']),
                'quantity' => $product['qty'],
                'added_date' => $data['purchase_date']
            ]);
        }
    }
}
