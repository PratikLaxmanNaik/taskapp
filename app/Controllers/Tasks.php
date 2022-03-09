<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        // $data = [
        //     ['id'=>1,'description'=>'First Task'],
        //     ['id'=>2,'description'=>'Second Task'],
        // ];

        $model = new \App\Models\TaskModel;
        $data = $model->findAll();
        // dd($data);           //alternate to var_dump in php core
        return view("Tasks/index", ['tasks' => $data]);
    }
    public function show($id)
    {
        $model = new \App\Models\TaskModel;

        $task = $model->find($id);

        // dd($task);                   //debugging line
        return view('Tasks/show', ['task' => $task]);
    }
    public function new()
    {
        return view("Tasks/new");
    }
    public function create()
    {
        $model = new \App\Models\TaskModel;

        $result = $model->insert([
            'description' => $this->request->getPost("description"),
        ]);

        if ($result === false) {
            // dd($model->errors());
            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('warning', 'Invalid Data');
        } else {
            // dd($model->insertID);
            // dd($result);
            return redirect()->to("/tasks/show/$result")
                ->with('info', 'Task created successfully');
        }
    }
}
