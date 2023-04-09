<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ListTodo\ListOfTodoListsRepositoryInterface;

class ListOfTodoListsController extends Controller
{
    protected $listTodoRepo;
    public function __construct(ListOfTodoListsRepositoryInterface $listTodoRepo)
    {
        $this->listTodoRepo = $listTodoRepo;
    }

    public function index()
    {
        $listOfListTodo = $this->listTodoRepo->getAll();

        return $listOfListTodo;
    }

    public function listOfTodoList($id)
    {
        $listOfListTodo = $this->listTodoRepo->getListTodoWithThingsTodo($id);

        return $listOfListTodo;
    }

    public function show($id)
    {
        $listTodo = $this->listTodoRepo->find($id);

        return $listTodo;
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here

        $listTodo = $this->listTodoRepo->create($data);

        return $listTodo;
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        //... Validation here
        $listTodo = $this->listTodoRepo->update($id, $data);

        return $listTodo;
    }

    public function destroy($id)
    {
        $this->listTodoRepo->delete($id);

        return 'ok';
    }
}
