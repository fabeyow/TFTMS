<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table         = 'tasks';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];
    protected $returnType    = 'array';

    /**
     * Get only tasks whose task_date equals today.
     */
    public function getTodayTasks(): array
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Get every task ordered by task_date descending.
     */
    public function getAllTasks(): array
    {
        return $this->orderBy('task_date', 'DESC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}
