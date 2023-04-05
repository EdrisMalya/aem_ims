<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\BaseUnit;
use App\Models\Brand;
use App\Models\Inventory;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Province;
use App\Models\Supplier;
use App\Models\SystemSetting;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class PartialController extends Controller
{
    public function index($lang, $type, Request $request){
        switch ($request->method()){
            case 'GET':
                return $this->getHandler($type);
            case 'POST':
                return $this->postHandler($type);
        }
    }

    public function getHandler($type){
        switch ($type){
            case 'get_provinces':
                return Province::query()->get();
            case 'fetch_brand':
                return Brand::query()->get();
            case 'fetch_units':
                return BaseUnit::query()->get();
            case 'fetch_categories':
                return ProductCategory::query()->get();
            case 'fetch_warehouse':
                return Warehouse::query()->where('status', true)->get();
            case 'fetch_payment_type':
                return PaymentType::query()->get();
            case 'fetch_suppliers':
                return Supplier::query()->get();
            case 'fetch-warehouse-products':
                $product_ids = Inventory::query()
                    ->where('warehouse_id', decrypt(\request()->get('warehouse_id')))
                    ->pluck('product_id')->unique()->toArray();
                return ProductResource::collection(
                    Product::query()
                        ->where('currency_id', SystemSetting::query()
                            ->first()->currency_id)->with(['purchase_unit'])
                        ->whereIn('id', $product_ids)
                        ->get());
            case 'test':
                dd(\request()->all());
        }
    }

    public function postHandler($type){
        switch ($type){
            case 'test':
                dd(\request()->all());
        }
    }
}
