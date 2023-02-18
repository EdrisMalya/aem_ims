<?php

namespace App\Http\Controllers\Configurations\StoreSettings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Http\Requests\SystemSettingRequest;
use App\Http\Resources\CurrencyResource;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\SystemSettingResource;
use App\Http\Resources\WarehouseResource;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Province;
use App\Models\SystemSetting;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use PHPUnit\Exception;

class SystemSettingsController extends Controller
{
    public function index(){
        $this->allowed('store-settings-access');
        return Inertia::render('Configuration/StoreSettings/SystemSetting/SystemSettingIndex', [
            'active' => 'store-settings',
            'active_module' => 'system-settings',
            'currencies' => CurrencyResource::collection(Currency::query()->get()),
            'customers' => CustomerResource::collection(Customer::query()->get()),
            'province' => ProvinceResource::collection(Province::query()->get()),
            'warehouses' => WarehouseResource::collection(Warehouse::query()->where('status', true)->get()),
            'system_setting' => new SystemSettingResource(SystemSetting::query()->first())
        ]);
    }
    public function store($lang, SystemSettingRequest $request){
        if(SystemSetting::query()->exists()){
            return back()->with(['message' => translate('System setting already configured'), 'type' => 'error']);
        }
        $request->validate([
            'logo' => ['required', 'file', 'image', 'max:5000']
        ]);
        $data = $request->validated();
        $data['province_id'] = $data['province']['value'];
        $data['warehouse_id'] = HelperController::isEncrypted($data['warehouse']['value']);
        $data['customer_id'] = HelperController::isEncrypted($data['customer']['value']);
        $data['currency_id'] = HelperController::isEncrypted($data['currency']['value']);
        unset($data['province']);
        unset($data['warehouse']);
        unset($data['customer']);
        unset($data['currency']);
        $data['logo'] = asset('storage/'.$request->file('logo')->store('store_logo', 'public'));
        SystemSetting::query()->create($data);
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }

    public function update($lang, SystemSettingRequest $request, $system_setting){
        try{
            $system_setting = SystemSetting::query()->findOrFail(decrypt($system_setting));
            $data = $request->validated();
            $data['province_id'] =HelperController::isEncrypted($data['province']['value']);
            $data['warehouse_id'] = HelperController::isEncrypted($data['warehouse']['value']);
            $data['customer_id'] = HelperController::isEncrypted($data['customer']['value']);
            $data['currency_id'] = HelperController::isEncrypted($data['currency']['value']);
            unset($data['province']);
            unset($data['warehouse']);
            unset($data['customer']);
            unset($data['currency']);
            if($request->file('logo')){
                $request->validate([
                    'logo' => ['required', 'file', 'image', 'max:5000']
                ]);
                HelperController::removeFile($system_setting->logo, 'url');
                $data['logo'] = asset('storage/'.$request->file('logo')->store('store_logo', 'public'));
            }else{
                $data['logo'] = $system_setting->logo;
            }
            $system_setting->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }catch (Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }
}
