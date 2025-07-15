<?php

namespace App\Http\Controllers;
use App\Http\Requests\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $form = Login::instanciate();
        return view('shared-utils::templates.login', [
            'form' => $form,
        ]);
    }
}
