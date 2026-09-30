<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    /**
     * Welcome page – shows only today's tasks.
     */
    public function index(): string
    {
        $taskModel = new TaskModel();

        $data = [
            'pageTitle'  => 'Welcome – Tasks for Today',
            'activePage' => 'home',
            'tasks'      => $taskModel->getTodayTasks(),
            'today'      => date('l, F j, Y'),
        ];

        return view('layout/header', $data)
             . view('pages/welcome', $data)
             . view('layout/footer');
    }
}
