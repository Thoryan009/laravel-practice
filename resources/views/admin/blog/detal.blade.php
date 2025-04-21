@extends('admin.master')
@section('body')


<div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Clients
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table>
          <thead>
          <tr>
            
            <th>Serial</th>
           
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>

            <th>Action</th>

          </tr>
          </thead>
          <tbody>

            

          <tr>
           
            <td data-label="Name">1</td>
            
            <td data-label="City">{{$blog->title}}</td>
            <td data-label="City" class="w-24" style="width: 450px;">{{$blog->content}}</td>
            <td >
                <img src="{{asset($blog->image)}}" alt="no image" style="height: 250px;">
            </td>
          
            <td class="actions-cell">
              <div class="buttons nowrap">
                <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                 <a href="{{route('blogs.edit', $blog)}}"> Edit</span></a>
                </button>
                
              </div>
            </td>
          </tr>

        
         
          </tbody>
        </table>
       
      </div>
    </div>




@endsection