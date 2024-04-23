<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getAllTasks(){
        return "get all tasks";
    }

    public function createTask(Request $request){
        $title = $request-> input ("title");
        return "create task";

    }
    public function updateTaskById(Request $request){
        $title = $request-> input ("title");
        return "update task";

    }
    public function deleteTaskById(Request $request){
        $title = $request-> input ("title");
        return "update task";

    }
}

