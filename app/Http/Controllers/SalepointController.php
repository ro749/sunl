<?php

namespace App\Http\Controllers;

use App\Tables\ProductSelect;
use App\Tables\PreviewSale;

class SalepointController extends Controller
{
    public function index()
    {
        $select_table = ProductSelect::instance();
        $preview_table = PreviewSale::instance();
        return view('product-select', [
            'title' => 'Productos',
            'select_table' => $select_table,
            'preview_table' => $preview_table
        ]);
    }
}
