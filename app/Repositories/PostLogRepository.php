<?php

namespace App\Repositories;

use App\Interfaces\PostLogRepositoryInterface;
use App\Models\PostLog;

class PostLogRepository implements PostLogRepositoryInterface
{
    public function postLogCreate($id, $action)
    {
        PostLog::newPostLog($id, $action);
    }
}