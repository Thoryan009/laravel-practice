<?php

namespace App\Http\Controllers;

use App\Interfaces\BlogRepositoryInterface;
use App\Interfaces\PostLogRepositoryInterface;
use App\Models\Blog;
use App\Models\PostLog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    protected $blogRepo, $postLogRepo;
    public function __construct(BlogRepositoryInterface $blogRepo, PostLogRepositoryInterface $postLogRepo)
    
    {
        $this->blogRepo = $blogRepo;
        $this-> postLogRepo = $postLogRepo;
    }

    public function index()
    {
        // return view('admin.blog.manage', ['blogs' => Blog::where('user_id', Auth::user()->id)->get()]);
        return view('admin.blog.manage', ['blogs' => $this->blogRepo->userBlogs()]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

   
    public $blog_id;
    public function store(Request $request)
    {
        DB::beginTransaction();

      try{

          // $blog =  Blog::newBlog($request,  Auth::user()->id);
          // PostLog::newPostLog($blog->id,  $action);
          
           $action  = 'created';
           $blog    = $this->blogRepo->create($request, Auth::user()->id);
           $this->postLogRepo->postLogCreate($blog->id, $action);

           DB::commit();
            
            return back()->with('message', 'New blog added ');
            }
             catch(\Exception $e)
             {
                 DB::rollBack();
                 return back()->with('message', 'Something went wrong with creating new Blog. Please try again: '.$e->getMessage());
             }   
    }

    public function show(Blog $blog)
    {
        // return view('admin.blog.detal', ['blog' => Blog::find($blog->id)]);
        return view('admin.blog.detal', ['blog' => $this->blogRepo->show($blog->id)]);
    }

    public function edit(Blog $blog)
    {
        // return view('admin.blog.edit', ['blog' => Blog::find($blog->id)]);
        return view('admin.blog.edit', ['blog' => $this->blogRepo->show($blog->id)]);
    }

    public function update(Request $request, Blog $blog)
    {

        DB::beginTransaction();
        try{
            // Blog::updateBlog($request, $blog->id);
            // PostLog::newPostLog($blog->id, $action);
            
            $action = 'updated';
            $this->blogRepo->update($request, $blog->id);
            $this->postLogRepo->postLogCreate($blog->id, $action);

            DB::commit();
            return redirect('/blogs')->with('message', 'Blog has updated');
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            return back()->with('message', 'Something went wrong with updateing this Blog. Please try again');
        }
       
    }

    public function destroy(Blog $blog)
    {

        DB::beginTransaction();
        try{
            // Blog::deleteBlog($blog->id);
            // PostLog::newPostLog($blog->id, $action);

            $action = 'deleted';
            $this->blogRepo->delete($blog->id);
            $this->postLogRepo->postLogCreate($blog->id, $action);

            DB::commit();
            return back()->with('message', 'Blog is deleted successfully');
        }

        catch(\Exception $e){

            DB::rollback();
            return back()->with('message', 'Something went wrong with deleting this  Blog. Please try again');
        }
    }
    public function showAll()
    {
        // return view('admin.blog.all-blogs', ['blogs' => Blog::all()]);

        return view('admin.blog.all-blogs', ['blogs' => $this->blogRepo->all()]);
    }
}
