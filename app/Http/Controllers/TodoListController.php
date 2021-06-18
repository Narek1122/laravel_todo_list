<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use App\Http\Requests\TodoListReq;
use App\Http\Requests\changeDataReq;

class TodoListController extends Controller
{


    public function getData(){
        $data = TodoList::get();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function addTask(TodoListReq $request){
        $validated = $request->validated();
        TodoList::create($validated);
        return response()->json([
            'status' => 200,
            'data' => $validated
        ]);
    }

    public function deleteData($id){
         TodoList::find($id)->delete();
        return response()->json([
            'statues' => 200
        ]);
    }

    public function changeTaskName($id,changeDataReq $request){
        $validated = $request->validated();
        TodoList::find($id)->update($validated);
        return response()->json([
            'statues' => 200
        ]);
    }
}
