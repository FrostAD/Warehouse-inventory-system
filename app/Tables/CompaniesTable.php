<?php

namespace App\Tables;

use App\Models\Company;
use App\Models\Type;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class CompaniesTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Company::class)
            ->routes([
                'index'   => ['name' => 'companies.index'],
                'create'  => ['name' => 'company.create'],
                'edit'    => ['name' => 'company.edit'],
                'destroy' => ['name' => 'company.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Company $company) => [
                'data-confirm' => __('Are you sure you want to delete the entry :entry?', [
                    'entry' => $company->database_attribute,
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
        $table->column('name')->sortable()->link(function(Company $company) {
            return route('company.view', $company);
        })->title('Name');
        $table->column()->value(function(Company $company) {
            $category = Type::where('id',$company->type_id)->first();
            return $category->name;
        })->title('Type');
//        $table->column('type_id')->sortable()->title('Type');
//        $table->column('address')->sortable();
//        $table->column('telephone')->sortable();
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
