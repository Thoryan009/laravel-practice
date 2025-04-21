<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .main-container{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }
        .blog-img{
            width: 250px;
            height: 250px;
        }
        .content{
            text-align: justify;
        }
        .card{
            margin: 20px
        }
    </style>
</head>
<body>
    
    <h1>Here you can See our blogs</h1>

    <section>
        <div class="main-container">
            @foreach ($blogs as $blog )
                
         
            <div class="card">
                <p> </p>
                <h3 class="title">{{$loop->iteration}}. {{$blog->title}} </h3>
                <img src="{{asset($blog->image)}}" class="blog-img" alt="">
                <p class="content">{{$blog->content}}</p>
            </div>
            @endforeach
        </div>
    </section>

</body>
</html>