@extends('admin.master')
@section('body')




<section class="section main-section">
    <div class="notification blue">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          <b>Responsive table</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    </div>
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
         All blogs
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <p>{{session('message')}}</p>
      <div class="card-content">
        <table>
          <thead>
          <tr>
    
            <th>Serial</th>
            <th>Author</th>

            <th>Title</th>
            <th>Action</th>

          </tr>
          </thead>
          <tbody>

            @foreach($blogs as $blog)

          <tr>
            <td data-label="Name">{{$loop->iteration}}</td>
            <td data-label="Name">{{$blog->user->name}}</td>
            <td data-label="City">{{$blog->title}}</td>  
            <td class="actions-cell">
              <div class="buttons nowrap">
                
                <button class="button small green"  data-target="sample-modal-2" type="button">
                 <a href="{{$blog->user_id == Auth::user()->id ? route('blogs.show', $blog) : '#'}}" onclick="{{$blog->user_id == Auth::user()->id ? '' : 'alert(`You dont have access to SEE this blog details`);'}}"> <span class="icon"><i class="mdi mdi-eye"></i></span></a>
                </button>

                <form action="{{route('blogs.destroy', $blog)}}" onclick="{{$blog->user_id == Auth::user()->id ? '' : 'alert(`You dont have access to DELETE`);'}}" method="post">
                    @method('delete')
                    @csrf 
                <button class="button small red " data-target="sample-modal" type="{{$blog->user_id == Auth::user()->id ? 'submit' : 'button'}}" onclick="return confirm('Are you sure to delete this..?')">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
                </form>
              </div>
            </td>
          </tr>

          @endforeach
         
          </tbody>
        </table>
       
      </div>
    </div>
  </section>
@endsection