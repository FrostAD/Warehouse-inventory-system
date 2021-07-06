<?php

namespace App\Tables;

use App\Models\Company;
use App\Models\Supply;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class SuppliesTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Supply::class)
            ->routes([
                'index'   => ['name' => 'supplies.index'],
                'create'  => ['name' => 'supply.create'],
                'edit'    => ['name' => 'supply.edit'],
                'destroy' => ['name' => 'supply.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Supply $supply) => [
                'data-confirm' => __('Are you sure you want to delete the entry :entry?', [
                    'entry' => $supply->database_attribute,
                ]),
            ]);
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
        $table->column('id')->sortable()->title('ID');
        $table->column()->value(function(Supply $supply) {
            $company = Company::where('id',$supply->company_id)->first();
            return $company->name;
        })->title('Company');
        $table->column('item_id')->sortable()->title('Item ID');
        $table->column('ordered_at')->dateTimeFormat('d/m/Y H:i')->sortable()->title('Ordered at');
        $table->column('quantity')->sortable()->title('Quantity');
        $table->column('price')->sortable()->title('Price');
        $table->column('arrives_at')->dateTimeFormat('d/m/Y H:i')->sortable()->title('Arrives at');
        $table->column()->value(function(Supply $supply) {
            return $supply->arrived? "Yes":"No";
        })->title('Arrived');
        $table->column('user_id')->sortable()->title('Staff ID');
        $table->column()->value(function(Supply $supply) {
            if(!$supply->user_id)
                return 'Accept';
        })->button(['btn', 'btn-sm', 'btn-primary'])->link(function(Supply $supply) {
            return route('supply.accept', $supply->id);
        });
//        $table->column('created_at')->dateTimeFormat('d/m/Y H:i')->sortable();
//        $table->column('updated_at')->dateTimeFormat('d/m/Y H:i')->sortable(true, 'desc');
    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
        //
    }
}
