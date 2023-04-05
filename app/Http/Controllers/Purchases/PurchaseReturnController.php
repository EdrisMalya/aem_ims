<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PurchaseReturnController extends Controller
{
    public function index($lang, Request $request ){
        $this->allowed('purchase-return-access');
        return Inertia::render('PurchaseManagement/PurchaseReturn/PurchaseReturnIndex', [
            'active' => 'purchase-return'
        ]);
    }

    public function create($lang, Request $request ){
        $this->allowed('purchase-return-create-purchase-return');
        return Inertia::render('PurchaseManagement/PurchaseReturn/PurchaseReturnForm', [
            'active' => 'purchase-return'
        ]);
    }
}
