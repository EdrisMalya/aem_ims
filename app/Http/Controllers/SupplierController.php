<?php

namespace App\Http\Controllers;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Province;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class SupplierController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('supplier-access');
        $suppliers = Supplier::query();
        $datatable = new DatatableBuilder($suppliers, $request, ['name', 'email', 'phone_number', 'province_id', 'address', ]);
        return Inertia::render('Supplier/SupplierIndex',[
            'suppliers' => SupplierResource::collection($datatable->build()),
            'provinces' => Inertia::lazy(fn()=>Province::query()->get()),
            'active' => 'suppliers',
        ]);
    }

    public function store($lang, SupplierRequest $request ){
        $this->allowed('supplier-create-supplier');
        $data = $request->validated();
        $data['province_id'] = $data['province_id']['value'];
        # $data['image'] = asset('storage/'.$request->file('image')->store('supplier_images','public'));
        Supplier::query()->create($data);
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }
    public function update($lang, SupplierRequest $request, $supplier){
        $this->allowed('supplier-edit-supplier');
        try {
            $supplier = Supplier::query()->findOrFail(decrypt($supplier));
            $data = $request->validated();
            /*if($request->file('image')){
                HelperController::removeFile($supplier->image, 'url');
                $data['image'] = asset('storage/'.$request->file('image')->store('supplier_images','public'));
            }else{
                $data['image'] = $supplier->image;
            }*/
            $data['province_id'] = $data['province_id']['value'];
            $supplier->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::info($exception);
            abort(404);
        }
    }

    public function destroy($lang, Request $request, $supplier){
        $this->allowed('supplier-delete-supplier');
        try {
            $supplier = Supplier::query()->findOrFail(decrypt($supplier));
            /*if($supplier->image){
                HelperController::removeFile($supplier->image, 'url');
            }*/
            $supplier->delete();
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }

}
