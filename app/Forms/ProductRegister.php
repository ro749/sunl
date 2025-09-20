<?php

namespace App\Forms;

use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Models\User;
use App\Models\Client;

class ProductRegister extends BaseFormRequest
{
    public function __construct()
    {
        parent::__construct(
            table: 'products',
            fields: [
                'name' => new FormField(
                    type: InputType::TEXT,
                    placeholder: 'Nuevo producto',
                ),
            ],
            submit_text: 'Agregar',
            callback: "$('#ProductsTable').DataTable().ajax.reload();",
        );
    }
    protected static ?ProductRegister $instance = null;

    public static function instanciate(): ProductRegister
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
