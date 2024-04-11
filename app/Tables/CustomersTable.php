<?php

namespace App\Tables;

use Okipa\LaravelTable\Abstracts\AbstractTableConfiguration;
use Okipa\LaravelTable\Column;
use Okipa\LaravelTable\Table;
use App\Models\Customer;

class CustomersTable extends AbstractTableConfiguration
{
    protected function table(): Table
    {
        return Table::make()->model(Customer::class);
    }

    protected function columns(): array
    {
        return [
            // The table columns configuration.
            Column::make("id")->sortable(),
            Column::make("name")->searchable()->sortable(),
            Column::make("user_id")->sortable(),

        ];
    }

    protected function results(): array
    {
        return [
            // The table results configuration.
            // As results are optional on tables, you may delete this method if you do not use it.
        ];
    }
}
