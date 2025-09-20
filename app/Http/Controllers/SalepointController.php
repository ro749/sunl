<?php

namespace App\Http\Controllers;

use App\Tables\ProductSelect;
use App\Tables\PreviewSale;
use App\Forms\PaymentForm;

class SalepointController extends Controller
{
    public function index()
    {
        $select_table = ProductSelect::instance();
        $preview_table = PreviewSale::instance();
        $payment_form = PaymentForm::instanciate();
        return view('product-select', [
            'title' => 'Productos',
            'select_table' => $select_table,
            'preview_table' => $preview_table,
            'payment_form' => $payment_form
        ]);
    }
}
