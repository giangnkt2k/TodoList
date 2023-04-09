<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TodoList\TodoListRepositoryInterface;

class TodoListController extends Controller
{
    protected $todoListRepo;
    public function __construct(TodoListRepositoryInterface $todoListRepository)
    {
        $this->todoListRepo = $todoListRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'yeah';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here
        $listTodo = $this->todoListRepo->create($data);

        return $listTodo;
    }

    /**
     * Display the specified resource.
     */
    public function showListActionInTodoList(string $id)
    {
        $listTodo = $this->todoListRepo->getAllContentInTheListByListID($id);

        return $listTodo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        //... Validation here
        $listTodo = $this->todoListRepo->update($id, $data);

        return $listTodo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->todoListRepo->delete($id);

        return 'ok';
    }
}
