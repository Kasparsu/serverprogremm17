<?php


namespace App\Controllers;


use App\Models\Employee;

class EmployeeController
{
    /**
     * output resource list view with elements
     */
    public function index() {
        $result = Employee::selectAll();
        view('employees/index');
    }

    /**
     * shows view with form to create new resource
     */
    public function create(){

    }

    /**
     * takes input from create view form and adds info to database
     */
    public function store(){

    }

    /**
     * shows view with form to edit existing resource
     */
    public function edit(){

    }

    /**
     * takes input from edit view form and updates info in database
     */
    public function update(){

    }

    /**
     *  shows view for single resource
     */
    public function view(){

    }

    /**
     * deletes a resource
     */
    public function delete(){

    }
}