<?php

namespace App\Http\Controllers;
use App\Forms\RegisterUser;
use App\Tables\UsersTable;
class UserController extends Controller
{
    public function form() {
        $form = RegisterUser::instanciate();
        return view('register-user', ['form'=>$form]);
    }

    public function table() {
        $table = UsersTable::instance();
        return view('table-users', ['table'=>$table]);
    }
}
