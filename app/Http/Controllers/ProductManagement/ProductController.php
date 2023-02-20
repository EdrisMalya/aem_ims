<?php

namespace App\Http\Controllers\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ProductcategoryResource;
use App\Models\Brand;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(){
        $this->allowed('product-access');
        return Inertia::render('ProductManagement/Products/ProductIndex', [
            'active' => 'products'
        ]);
    }

    public function create($lang, Request $request){
        $this->allowed('product-add-product');
        return Inertia::render('ProductManagement/Products/ProductForm', [
            'active' => 'products',
            'categories' => ProductcategoryResource::collection(ProductCategory::query()->get()),
            'brand' => BrandResource::collection(Brand::query()->get())
        ]);
    }
}
