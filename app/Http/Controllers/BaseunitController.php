<?php

namespace App\Http\Controllers;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\BaseunitRequest;
use App\Http\Resources\BaseunitResource;
use App\Models\Baseunit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class BaseunitController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('base-unit-create-base-uit');
        $baseunits = Baseunit::query();
        $datatable = new DatatableBuilder($baseunits, $request, []);
        return Inertia::render('ProductManagement/Baseunit/BaseunitIndex',[
            'baseunits' => BaseunitResource::collection($datatable->build()),
            'active' => 'base-unit'
        ]);
    }

    public function store($lang, BaseunitRequest $request ){
        $this->allowed('base-unit-create-base-uit');
        $data = $request->validated();
        # $data['image'] = asset('storage/'.$request->file('image')->store('baseunit_images','public'));
        Baseunit::query()->create($data);
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }
    public function update($lang, BaseunitRequest $request, $baseunit){
        $this->allowed('base-unit-edit-base-unit');
        try {
            $baseunit = Baseunit::query()->findOrFail(decrypt($baseunit));
            $data = $request->validated();
            /*if($request->file('image')){
                HelperController::removeFile($baseunit->image, 'url');
                $data['image'] = asset('storage/'.$request->file('image')->store('baseunit_images','public'));
            }else{
                $data['image'] = $baseunit->image;
            }*/
            $baseunit->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::info($exception);
            abort(404);
        }
    }

    public function destroy($lang, Request $request, $baseunit){
        $this->allowed('base-unit-delete-base-unit');
        try {
            $baseunit = Baseunit::query()->findOrFail(decrypt($baseunit));
            /*if($baseunit->image){
                HelperController::removeFile($baseunit->image, 'url');
            }*/
            $baseunit->delete();
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }

}
