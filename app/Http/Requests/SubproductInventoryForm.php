<?php

namespace App\Http\Requests;

use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Models\User;
use App\Models\Client;

class SubproductInventoryForm extends BaseFormRequest
{
    public function __construct()
    {
        parent::__construct(
            id: "SubproductInventoryForm",
            table: "subproducts",
            submit_text: "",
            formFields: [
                'name'=> new FormField(
                    type: InputType::TEXT,
                )
            ],
        );
    }
    protected static ?SubproductInventoryForm $instance = null;

    public static function instanciate(): SubproductInventoryForm
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
