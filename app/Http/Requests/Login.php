<?php

namespace App\Http\Requests;

use Ro749\SharedUtils\FormRequests\LoginFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Models\User;
use App\Models\Client;

class Login extends LoginFormRequest
{
    public function __construct()
    {
        parent::__construct(
            id: "Login",
            table: "users",
            submit_text: "Entrar",
            //submit_url: "/login",
            redirect: "/poducts",
            formFields: [
                "email" => new FormField(
                    placeholder:"Usuario", 
                    type: InputType::TEXT,
                    icon: "bx bx-user"
                ),
                "password" => new FormField(
                    placeholder:"Contraseña",
                    type: InputType::PASSWORD,
                    icon: "bx bx-lock-alt"
                ),
            ],
        );
    }
    protected static ?LoginFormRequest $instance = null;

    public static function instanciate(): LoginFormRequest
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
