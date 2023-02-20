<?php

namespace App\Http\Controllers\Configurations\StoreSettings;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;
use App\Http\Resources\WarehouseResource;
use App\Models\Province;
use App\Models\SystemSetting;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class WarehouseController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('warehouse-access');
        $warehouses = Warehouse::query();
        $datatable = new DatatableBuilder($warehouses, $request, ['name', 'email', 'phone_number', 'address', 'province_id', 'status', ]);
        return Inertia::render('Warehouse/WarehouseIndex',[
            'warehouses' => WarehouseResource::collection($datatable->build()),
            'active_module' => 'warehouse',
            'provinces' => Inertia::lazy(fn () => Province::query()->get()),
            'active' => 'store-settings'
        ]);
    }

    public function store($lang, WarehouseRequest $request ){
        $this->allowed('warehouse-create-warehouse');
        $data = $request->validated();
        $data['province_id'] = $data['province_id']['value'];
        $data['status'] = true;
        Warehouse::create($data);
        # $data['image'] = asset('storage/'.$request->file('image')->store('warehouse_images','public'));
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }
    public function update($lang, WarehouseRequest $request, $warehouse){
        $this->allowed('warehouse-edit-warehouse');
        $data = $request->validated();
        $data['province_id'] = $data['province_id']['value'];
        try {
            $warehouse = Warehouse::query()->findOrFail(decrypt($warehouse));
            /*if($request->file('image')){
                HelperController::removeFile($warehouse->image, 'url');
                $data['image'] = asset('storage/'.$request->file('image')->store('warehouse_images','public'));
            }else{
                $data['image'] = $warehouse->image;
            }*/
            $warehouse->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::info($exception);
            abort(404);
        }
    }

    public function destroy($lang, Request $request, $warehouse){
        $this->allowed('warehouse-delete');
        try {
            $warehouse = Warehouse::query()->findOrFail(decrypt($warehouse));
            /*if($warehouse->image){
                HelperController::removeFile($warehouse->image, 'url');
            }*/
            $check = SystemSetting::query()->where('warehouse_id', $warehouse->id)->exists();
            if($check){
                return back()->with(['message' => translate('Cannot be deleted'), 'type' => 'error']);
            }
            $warehouse->delete();
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }

}
