<?php

namespace App\Http\Controllers\Configurations\StoreSettings;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentTypeRequest;
use App\Http\Resources\PaymentTypeResource;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class PaymentTypeController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('payment-types-access');
        return Inertia::render('Configuration/StoreSettings/PaymentType/PaymentTypeIndex',[
            'payment_types' => PaymentTypeResource::collection(PaymentType::query()->get()),
            'active' => 'store-settings',
            'active_module' => 'payment-type'
        ]);
    }

    public function store($lang, PaymentTypeRequest $request ){
        $this->allowed('payment-types-create');
        $data = $request->validated();
        # $data['image'] = asset('storage/'.$request->file('image')->store('paymenttype_images','public'));
        PaymentType::query()->create($data);
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }
    public function update($lang, PaymentTypeRequest $request, $paymenttype){
        $this->allowed('paymenttype-edit-paymenttype');
        try {
            $paymenttype = PaymentType::query()->findOrFail(decrypt($paymenttype));
            $data = $request->validated();
            /*if($request->file('image')){
                HelperController::removeFile($paymenttype->image, 'url');
                $data['image'] = asset('storage/'.$request->file('image')->store('paymenttype_images','public'));
            }else{
                $data['image'] = $paymenttype->image;
            }*/
            $paymenttype->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::info($exception);
            abort(404);
        }
    }

    public function destroy($lang, Request $request, $payment_type){
        $this->allowed('payment-types-delete');
        try {
            $payment_type = PaymentType::query()->findOrFail(decrypt($payment_type));
            /*if($paymenttype->image){
                HelperController::removeFile($paymenttype->image, 'url');
            }*/
            if($payment_type->purchases->count() > 0){
                return back()->with(['message' => translate('Cannot be deleted'), 'type' => 'error']);
            }
            $payment_type->delete();
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }

}
