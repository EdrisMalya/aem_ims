<?php

namespace App\Http\Controllers\ProductManagement;

use App\Http\Controllers\Controller;
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
}
