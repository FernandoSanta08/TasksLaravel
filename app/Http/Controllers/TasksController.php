<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TasksController extends Controller
{
    public function store(Request $request){
        $request -> validate([
            'title' => 'required|min:3'
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->category_id = $request->category_id;
        $task->save();
        
        if ($request->wantsJson()){
            return response()->json(["task"=>$task,"code"=>'success'], 200);
        }
        return redirect()->route('tasks')->with('success', 'Tarea creada correctamente');
    }

    public function index(Request $request){
        $tasks = Task::all();
        $categories = Category::all();

        if ($request->wantsJson()){
            return response()->json(["payload"=>["task"=> $tasks, "categories" => $categories]], 200);
        }
        return view('tasks.index', ['tasks' => $tasks, 'categories' => $categories]);
    }

    public function show(Request $request, $id){
        $task = Task::find($id);

        if ($request->wantsJson()){
            return response()->json(['task' => $task], 200);
        }
        return view('tasks.show', ['task' => $task]);
    }

    public function update(Request $request, $id){
        $request -> validate([
            'title' => 'required|min:3'
        ]);
        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();

        if ($request->wantsJson()){
            return response()->json(["task"=>$task,"code"=>'success'], 200);
        }

        //return view('tasks.update', ['success', 'Tarea actualizada correctamente']);
        return redirect()->route('tasks')->with('success', 'Tarea actualizada correctamente');
    }

    public function destroy(Request $request, $id){
        $task = Task::find($id);
        $task-> delete();

        if ($request->wantsJson()){
            return response()->json(["success"], 200);
        }

        return redirect()->route('tasks')->with('success', 'Tarea eliminada correctamente');
    }

}
