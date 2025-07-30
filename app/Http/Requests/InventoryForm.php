<?php

namespace App\Http\Requests;

use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Models\User;
use App\Models\Client;

class InventoryForm extends BaseFormRequest
{
    public function __construct()
    {
        parent::__construct(
            id: "InventoryForm",
            table: "inventory",
            submit_text: "",
            formFields: [
                'value' => new FormField(
                    type: InputType::NUMBER
                ),
            ],
        );
    }
    protected static ?InventoryForm $instance = null;

    public static function instanciate(): InventoryForm
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
