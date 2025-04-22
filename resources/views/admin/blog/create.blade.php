@extends('admin.master')

@section('body')



<section class="section main-section ">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Create Blogs {{Session::get('email')}}
        </p>
      </header>
      <div class="card-content">
        
        <div class="">
          <div class="flex flex-col md:flex-row items-center justify-end space-y-3 md:space-y-0">
            <div class="">
              
              <b>{{session('message')}}</b>
            </div>
           
          </div>
        </div>
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
              <button type='submit' class="button green ">
                Submit</button>
              
          </div>
        </form>
      </div>
    </div>

  
  </section>




@endsection