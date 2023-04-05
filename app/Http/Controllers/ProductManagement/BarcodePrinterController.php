<?php

namespace App\Http\Controllers\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\WarehouseResource;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BarcodePrinterController extends Controller
{
    public function index($lang, Request $request ){
        $this->allowed('print-barcode-access');
        return Inertia::render('ProductManagement/BarcodePrint/BarcodePrintIndex', [
            'active' => 'print-barcode',
            'warehouses' => WarehouseResource::collection(Warehouse::query()->get())
        ]);
    }
}
