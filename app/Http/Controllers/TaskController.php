<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\TaskModel;

class TaskController extends Controller
{
    public function store(Request $request){
            //dd($request->all());
            $task=new TaskModel();
            $this->validate($request,[
                'task'=>'required|max:100|min:5',
            ]);
            $task->tasks=$request->task;
            $task->save();

           $data=TaskModel::all();
           return view('task')-> with ('tasks', $data);
    }

    public function markAsCompleted($id){
        $task=TaskModel::find($id);
        $task->isCompleted=1;
        $task->save();
        return redirect()->back();
    }
    public function markAsNotCompleted($id){
         $task=TaskModel::find($id);
        $task->isCompleted=0;
        $task->save();
        return redirect()->back();
    }
    public function deleteTask($id){
        $task=TaskModel::find($id);
        $task->delete();
        return redirect()->back();
    }

}
