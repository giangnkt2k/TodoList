<?php

namespace App\Repositories\TodoList;

use App\Repositories\RepositoryInterface;

interface TodoListRepositoryInterface extends RepositoryInterface
{
    public function getAllContentInTheListByListID($list_id);
}
