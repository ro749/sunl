<?php

namespace App\Tables\CorteCaja;

use Ro749\SharedUtils\Tables\BaseTableDefinition;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Models\LogicModifiers\ForeignKey;
use Ro749\SharedUtils\Models\LogicModifiers\Statistic;
use Ro749\SharedUtils\Models\StatisticType;
class BanksTable extends BaseTableDefinition
{
    public function __construct(){
        parent::__construct(
            id: 'BanksTable',
            getter: new ArrayGetter(
                table: 'sales',
                columns : [
                    'bank' => new Column(
                        display: 'Banco',
                        logic_modifier: new ForeignKey(
                            table: 'banks',
                            column: 'name'
                        )
                    ),
                    'reference' => new Column(display: 'Referencia'),
                    'cantidad' => new Column(
                        display: 'Cantidad', 
                        logic_modifier: new Statistic(
                            statistic_type: StatisticType::TOTAL,
                            table: 'sold_products',
                            data_column: 'quantity'
                        )
                    )
                ],
                filters: [],
                backend_filters: []
            )
        );
    }

    protected static ?BanksTable $instance = null;

    public static function instance(): BanksTable
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}