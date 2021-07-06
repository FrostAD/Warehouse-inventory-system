<?php

namespace App\Tables;

use App\Models\User;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class UsersTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(User::class)
            ->routes([
                'index'   => ['name' => 'users.index'],
//                'create'  => ['name' => 'user.create'],
//                'edit'    => ['name' => 'user.edit'],
//                'destroy' => ['name' => 'user.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(User $user) => [
                'data-confirm' => __('Are you sure you want to delete the entry :entry?', [
                    'entry' => $user->database_attribute,
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
        $table->column()->html(function(User $user) {
            return '<div>' . $user->getRoleNames() . '</div>';
        })->title('Roles');
        $table->column('email')->button(['btn', 'btn-sm', 'btn-primary'])->link(function(User $user) {
            return route('users.index', $user);
        })->title('Action');

        $table->column('created_at')->dateTimeFormat('d/m/Y H:i')->sortable();
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
