<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    public static $blog, $image, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName =  self::$image->getClientOriginalName();
        self::$directory =  "uploads/blog_image/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }


    public static function newBlog($request, $id)
    {
        self::$blog = new Blog();

        self::$blog->user_id = $id;
        self::$blog->title = $request->title;
        self::$blog->content = $request->content;
        self::$blog->image = self::getImageUrl($request);
        self::$blog->save();
    }

    public static function updateBlog($request, $id)
    {
        self::$blog = Blog::find($id);

        if(isset($request->image))
            {
                self::$imageUrl = self::getImageUrl($request);
                self::$blog->image = self::$imageUrl;
            }
        
        self::$blog->title = $request->title;
        self::$blog->content = $request->content;

        self::$blog->save();
    }

    public static function  deleteBlog($id)
    {
        self::$blog = Blog::find($id);

        if(file_exists(self::$blog->image))
        {
            unlink(self::$blog->image);
        
        }
        self::$blog->delete();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
