<?php

namespace App\Http\Requests;

use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Models\User;
use App\Models\Client;

class ProductInventoryForm extends BaseFormRequest
{
    public function __construct()
    {
        parent::__construct(
            id: "ProductInventoryForm",
            table: "products",
            submit_text: "",
            formFields: [
                'name'=> new FormField(
                    type: InputType::TEXT,
                )
            ],
        );
    }
    protected static ?ProductInventoryForm $instance = null;

    public static function instanciate(): ProductInventoryForm
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
