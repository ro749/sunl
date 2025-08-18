<?php

namespace App\Http\Controllers;

use App\Tables\ProductSelect;

class SalepointController extends Controller
{
    public function index()
    {
        $table = ProductSelect::instance();
        return view('product-select', [
            'title' => 'Productos',
            'table' => $table
        ]);
    }
}
