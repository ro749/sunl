<?php

namespace App\Forms;

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
            table: "subproducts",
            submit_text: "",
            fields: [
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
