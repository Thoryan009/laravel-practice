<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLog extends Model
{
    use HasFactory;
    public static $post_log;

    public static function newPostLog($id, $action)
    {
        self::$post_log             = new PostLog();
        self::$post_log->post_id    = $id;
        self::$post_log->action     = $action;
        self::$post_log->save();
    }
}
