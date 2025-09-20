<?php

namespace App\Forms;

use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Models\User;
use App\Models\Client;

class SubproductRegister extends BaseFormRequest
{
    public function __construct()
    {
        parent::__construct(
            table: 'subproducts',
            fields: [
                'name' => new FormField(
                    type: InputType::TEXT,
                    placeholder: 'Nuevo producto',
                ),
                'product'=> new FormField(
                    type: InputType::HIDDEN,
                )
            ],
            submit_text: 'Agregar',
            callback: "$('#SubproductsTable').DataTable().ajax.reload();",
        );
    }
    protected static ?SubproductRegister $instance = null;

    public static function instanciate(): SubproductRegister
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
