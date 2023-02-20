<?php

namespace App\Http\Controllers\Configurations\StoreSettings;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use App\Models\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CurrencyController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('currency-access');
        $currencys = Currency::query();
        $datatable = new DatatableBuilder($currencys, $request, ['name', 'code', 'symbol', ]);
        return Inertia::render('Configuration/StoreSettings/Currency/CurrencyIndex',[
            'currencys' => CurrencyResource::collection($datatable->build()),
            'active_module' => 'currencies',
            'active' => 'store-settings'
        ]);
    }

    public function store($lang, CurrencyRequest $request ){
        $this->allowed('currency-create-currency');
        $data = $request->validated();
        # $data['image'] = asset('storage/'.$request->file('image')->store('currency_images','public'));
        Currency::query()->create($data);
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }
    public function update($lang, CurrencyRequest $request, $currency){
        $this->allowed('currency-edit-currency');
        try {
            $currency = Currency::query()->findOrFail(decrypt($currency));
            $data = $request->validated();
            /*if($request->file('image')){
                HelperController::removeFile($currency->image, 'url');
                $data['image'] = asset('storage/'.$request->file('image')->store('currency_images','public'));
            }else{
                $data['image'] = $currency->image;
            }*/
            $currency->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::info($exception);
            abort(404);
        }
    }

    public function destroy($lang, Request $request, $currency){
        $this->allowed('currency-delete-currency');
        try {
            $currency = Currency::query()->findOrFail(decrypt($currency));
            /*if($currency->image){
                HelperController::removeFile($currency->image, 'url');
            }*/
            $check = SystemSetting::query()->where('currency_id', $currency->id)->exists();
            if($check){
                return back()->with(['message' => translate('Cannot be delete'), 'type' => 'error']);
            }
            $currency->delete();
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }

}
