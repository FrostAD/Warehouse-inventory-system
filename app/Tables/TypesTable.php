<?php

namespace App\Tables;

use App\Models\Type;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class TypesTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Type::class)
            ->routes([
                'index'   => ['name' => 'types.index'],
                'create'  => ['name' => 'type.create'],
                'edit'    => ['name' => 'type.edit'],
                'destroy' => ['name' => 'type.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Type $type) => [
                'data-confirm' => __('Are you sure you want to delete the entry :entry?', [
                    'entry' => $type->database_attribute,
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
        $table->column('created_at')->dateTimeFormat('d/m/Y H:i')->sortable()->title('Added');
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
