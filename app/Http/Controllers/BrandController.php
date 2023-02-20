<?php

namespace App\Http\Controllers;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('brand-access');
        $brands = Brand::query();
        $datatable = new DatatableBuilder($brands, $request, ['image', 'name', ]);
        return Inertia::render('ProductManagement/Brand/BrandIndex',[
            'brands' => BrandResource::collection($datatable->build()),
            'active' => 'brands'
        ]);
    }

    public function store($lang, BrandRequest $request ){
        $this->allowed('brand-create-brand');
        $data = $request->validated();
        $request->validate([
            'image' => ['nullable', 'file', 'image', 'max:5000']
        ]);
        if($request->file('image')) {
            $data['image'] = asset('storage/'.$request->file('image')->store('brand_images','public'));
        }
        Brand::query()->create($data);
        return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
    }
    public function update($lang, BrandRequest $request, $brand){
        $this->allowed('brand-edit-brand');
        try {
            $brand = Brand::query()->findOrFail(decrypt($brand));
            $data = $request->validated();
            if($request->file('image')){
                HelperController::removeFile($brand->image, 'url');
                $request->validate([
                    'image' => ['required', 'file', 'image', 'max:5000']
                ]);
                $data['image'] = asset('storage/'.$request->file('image')->store('brand_images','public'));
            }else{
                $data['image'] = $brand->image;
            }
            $brand->update($data);
            return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::info($exception);
            abort(404);
        }
    }

    public function destroy($lang, Request $request, $brand){
        $this->allowed('brand-delete-brand');
        try {
            $brand = Brand::query()->findOrFail(decrypt($brand));
            if($brand->image){
                HelperController::removeFile($brand->image, 'url');
            }
            $brand->delete();
            return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
        }
        catch (\Exception $exception){
            Log::error($exception);
            abort(404);
        }
    }

}
