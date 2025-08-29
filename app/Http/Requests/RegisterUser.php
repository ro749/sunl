<?php

namespace App\Http\Requests;

use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Models\User;

class RegisterUser extends BaseFormRequest
{
    public function __construct($formFields = [])
    {
        $User = new User();
        $User->get_register_form($this);
        $this->id = 'RegisterUser';
        $this->submit_text = 'Registrar';
    }
    protected static ?RegisterUser $instance = null;

    public static function instanciate(): RegisterUser
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
