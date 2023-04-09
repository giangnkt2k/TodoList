<?php

namespace App\Repositories\TodoList;

use App\Repositories\BaseRepository;

class TodoListRepository extends BaseRepository implements TodoListRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\TodoList::class;
    }

    public function getAllContentInTheListByListID($list_id)
    {
        return $this->model->where(['list_id', $list_id])->get();
    }
}
