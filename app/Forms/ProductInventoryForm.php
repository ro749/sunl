<?php

namespace App\Forms;

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
            table: "products",
            submit_text: "",
            fields: [
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
