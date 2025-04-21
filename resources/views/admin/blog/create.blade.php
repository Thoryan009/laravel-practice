@extends('admin.master')

@section('body')



<section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Create Blogs
        </p>
      </header>
      <div class="card-content">
        <p class="text-center text-5xl">{{session('message')}}</p>
        <form method="post" action="{{route('blogs.store')}}" enctype="multipart/form-data">
            @csrf
          <div class="field">
            <label class="label">Blog</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  
                  <input class="input" type="text" placeholder="Title" required name="title">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
             
              <div class="field">
                <div class="control icons-left">
                  <textarea name="content" id="" class="input" placeholder="Content" required></textarea>
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>

              <div class="field">
                <label class="label">File</label>
                <div class="field-body">
                    <div class="field file">
                    <label class="upload control">
                        <a class="button blue">
                        Upload
                        </a>
                        <input type="file" name="image" required>
                    </label>
                    </div>
                </div>
                </div>
            </div>
          </div>
   
    <div>
        <button type='submit' class="button green">
          Submit</button>
        
    </div>
        </form>
      </div>
    </div>

  
  </section>




@endsection