<?php

namespace App\Controllers;

class Migrate extends BaseController
{
    public function index()
    {
       $migrate = \Config\Services::migrations();

       try{
           $migrate->latest();

           echo "migrated";

       } Catch(\Exception $e){
           echo $e->getMessage();
       }
    }
    //---------------------------------------------------------
}
