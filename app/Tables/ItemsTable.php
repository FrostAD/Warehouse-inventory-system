<?php

namespace App\Tables;

use App\Models\Category;
use App\Models\Company;
use App\Models\Item;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class ItemsTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Item::class)
            ->routes([
                'index'   => ['name' => 'items.index'],
                'create'  => ['name' => 'item.create'],
                'edit'    => ['name' => 'item.edit'],
                'destroy' => ['name' => 'item.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Item $item) => [
                'data-confirm' => __('Are you sure you want to delete the entry :entry?', [
                    'entry' => $item->database_attribute,
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
        $table->column('name')->sortable()->title('Name');
        $table->column('price')->sortable()->title('Price');
        $table->column('quantity')->sortable()->title('Quantity');
        $table->column('minimum_quantity')->sortable()->title('Minimum quantity');
        $table->column()->value(function(Item $item) {
            return $item->auto_fill? "Yes":"No";
        })->title('Auto fill');
        $table->column()->value(function(Item $item) {
            $company = Company::where('id',$item->manufacturer_id)->first();
            return $company->name;
        })->title('Manufacturer');
        $table->column()->value(function(Item $item) {
            $category = Category::where('id',$item->category_id)->first();
            return $category->name;
        })->title('Category');
        $table->column()->value(function(Item $item) {
            if(auth()->user()){
            if(auth()->user()->hasRole('user')){
            return 'Buy';
            }
            }
        })->button(['btn', 'btn-sm', 'btn-primary'])->link(function(Item $item) {
            return route('user.make_order', $item->id);
        });
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
