<?php

namespace App\Http\Controllers\Configurations\StoreSettings;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('customers-access');
        $customers = Customer::query();
        $datatable = new DatatableBuilder($customers, $request, ['name', 'phone_number', 'email', 'address', ]);
        return Inertia::render('Customer/CustomerIndex',[
            'customers' => CustomerResource::collection($datatable->build()),
            'active' => 'customers'
        ]);
    }

    public function store($lang, CustomerRequest $request ){
        $this->allowed('customers-create-customer');
        $data = $request->validated();
        # $data['image'] = asset('storage/'.$request->file('image')->store('customer_images','public'));
        Customer::query()->create($data);
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }
    public function update($lang, CustomerRequest $request, $customer){
        $this->allowed('customers-edit-customer');
        try {
            $customer = Customer::query()->findOrFail(decrypt($customer));
            $data = $request->validated();
            /*if($request->file('image')){
                HelperController::removeFile($customers->image, 'url');
                $data['image'] = asset('storage/'.$request->file('image')->store('customer_images','public'));
            }else{
                $data['image'] = $customers->image;
            }*/
            $customer->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::info($exception);
            abort(404);
        }
    }

    public function destroy($lang, Request $request, $customer){
        $this->allowed('customers-delete-project');
        try {
            $customer = Customer::query()->findOrFail(decrypt($customer));
            /*if($customers->image){
                HelperController::removeFile($customers->image, 'url');
            }*/
            $customer->delete();
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }

}
