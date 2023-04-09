<?php

namespace App\Repositories\ListTodo;

use App\Repositories\BaseRepository;

class ListOfTodoListsRepository extends BaseRepository implements ListOfTodoListsRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\ListOfTodoLists::class;
    }

    public function getProduct()
    {
        return $this->model->select('name')->take(5)->get();
    }

    public function getListTodoWithThingsTodo($id)
    {
        return $this->model->find($id)->with(['things'])->get();
    }
}
