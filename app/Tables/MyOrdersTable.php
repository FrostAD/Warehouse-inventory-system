<?php

namespace App\Tables;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class MyOrdersTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Order::class)
            ->query(function(Builder $query){
                $query->where('user_id','=',auth()->id());
            })
            ->routes([
                'index'   => ['name' => 'orders.index'],
//                'create'  => ['name' => 'order.create'],
//                'edit'    => ['name' => 'order.edit'],
//                'destroy' => ['name' => 'order.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Order $order) => [
                'data-confirm' => __('Are you sure you want to delete the entry :entry?', [
                    'entry' => $order->database_attribute,
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
//        $table->column('id')->sortable();
//        $table->column('user_id')->sortable();
        $table->column()->value(function(Order $order) {
            $item = Item::where('id',$order->item_id)->first();
            return $item->name;
        })->title('Item');
        $table->column('date')->dateTimeFormat('d/m/Y H:i')->sortable()->title('Ordered at');
        $table->column('quantity')->sortable()->title('Quantity');
        $table->column('price')->sortable()->title('Price');
        $table->column('staff_id')->sortable()->title('Staff ID');
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
