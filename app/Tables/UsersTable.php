<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\BaseTableDefinition;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Tables\ColumnModifiers\Enum;
use Ro749\SharedUtils\Filters\BackendFilters\UserFilter;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
class UsersTable extends BaseTableDefinition
{
    public function __construct(){
        $User = new User();
        $User->get_table($this);
        
    }

    protected static ?UsersTable $instance = null;

    public static function instance(): UsersTable
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}