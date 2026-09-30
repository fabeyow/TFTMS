<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    /**
     * Task List page – displays every task ordered by date.
     */
    public function index(): string
    {
        $taskModel = new TaskModel();

        $data = [
            'pageTitle'  => 'All Tasks',
            'activePage' => 'tasks',
            'tasks'      => $taskModel->getAllTasks(),
        ];

        return view('layout/header', $data)
             . view('pages/tasks', $data)
             . view('layout/footer');
    }
}
