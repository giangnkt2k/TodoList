<?php

namespace App\Repositories\ListTodo;

use App\Repositories\RepositoryInterface;

interface ListOfTodoListsRepositoryInterface extends RepositoryInterface
{
    public function getProduct();

    public function getListTodoWithThingsTodo($id);
}
