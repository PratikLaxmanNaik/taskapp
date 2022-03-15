<?php

namespace App\Controllers;

use App\Entities\Task;

class Tasks extends BaseController
{
    private $model;

    private $current_user;

    public function __construct()
    {
        $this->model = new \App\Models\TaskModel;
        $this->current_user = service('auth')->getCurrentUser();
    }
    

    public function index()
    {
        
        // $auth = service('auth');
        // $user = $auth->getCurrentUser();

        $data = $this->model->paginateTasksByUserId($this->current_user->id);
        // dd($data);           //alternate to var_dump in php core
        return view("Tasks/index", [
            'tasks' => $data,
            'pager'=> $this->model->pager
        ]);
    }
    public function show($id)
    {
        // $model = new \App\Models\TaskModel;

        $task = $this->getTaskOr404($id);

        return view('Tasks/show', ['task' => $task]);
    }
    public function new()
    {
        $task = new Task;


        return view("Tasks/new", [
            'task' => $task
        ]);
    }
    public function create()
	{
        // $model = new \App\Models\TaskModel;
		
		$task = new Task($this->request->getPost());

        // $user = service('auth')->getCurrentUser();

        $task->user_id = $this->current_user->id;
		
		if ($this->model->insert($task)) {

			return redirect()->to("/tasks/show/{$this->model->insertID}")
							 ->with('info', 'Task created successfully');
		
        } else {

			return redirect()->back()
							 ->with('errors', $this->model->errors())
							 ->with('warning', 'Invalid data')
							 ->withInput();
		}
	}
    public function edit($id)
    {
        // $model = new \App\Models\TaskModel;

        $task = $this->getTaskOr404($id);

        return view('Tasks/edit', [
            'task' => $task
        ]);
    }
    public function update($id)
    {
        // $model = new \App\Models\TaskModel;

        $task = $this->getTaskOr404($id);

        $post = $this->request->getPost();
		unset($post['user_id']);

        $task->fill($post);

        if(! $task->hasChanged()){
            return redirect()->back()
                             ->with('warning','Nothing to update')
                             ->withInput();
        }

            // $result = $model->update($id, [
            // 'description' => $this->request->getPost('description'),]);
        if($this->model->save($task)){
        // if ($result) {
            return redirect()->to("/tasks/show/$id")
                ->with('info', 'Task updated successfully');
        } else {
            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->with('warning', 'Invalid Data')
                ->withInput();
        }
    }
    public function delete($id)
    {
        $task = $this->getTaskOr404($id);

        if($this->request->getMethod() === 'post'){
            $this->model->delete($id);

            return redirect()->to('/tasks')
                             ->with('info','Task Deleted');
        }

        return view('Tasks/delete', [
            'task'=>$task
        ]);
    }
    public function getTaskOr404($id)
    {
        // $user = service('auth')->getCurrentUser();

        
		// $task = $this->model->find($id);
		
		// if ($task !== null && ($task->user_id !== $user->id)) {
		
		// 	$task = null;
			
		// }
		

        $task = $this->model->getTaskByUserId($id, $this->current_user->id);

        if($task===null){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");
        }
        return $task;
    }
}
