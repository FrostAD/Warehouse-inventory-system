<?php

namespace App\Tables;

use App\Models\Category;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class CategoriesTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Category::class)
            ->routes([
                'index'   => ['name' => 'categories.index'],
                'create'  => ['name' => 'category.create'],
                'edit'    => ['name' => 'category.edit'],
                'destroy' => ['name' => 'category.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Category $category) => [
                'data-confirm' => __('Are you sure you want to delete the entry :entry?', [
                    'entry' => $category->database_attribute,
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
        $table->column('details')->sortable()->title('Description');
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
