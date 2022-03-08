<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        $data = [
            ['id'=>1,'description'=>'First Task'],
            ['id'=>2,'description'=>'Second Task'],
        ];

        return view("Tasks/index", ['tasks'=>$data]);
    }
}
