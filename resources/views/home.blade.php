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
            margin: 20px;
            height: 400px;
            overflow: hidden;
            
        }
        .btn{
            padding: 5px 10px;
            background-color: red;
            color: yellow;
            border-radius: 10px;
        }
       
    </style>
</head>
<body>
    

    <input id="name" type="text" placeholder="Enter your name">
    <button id="btn">Submit</button>
    <h2> Your name is: <span id="showHere"></span> </h2>

    <a href="{{route('more-data')}}">More Data Page</a>

    <form action="{{route('store')}}" method="post">
        @csrf
        <section>
            <input type="number" name="num1" id="">
        </section>
        <section>
            <input type="number" name="num2" id="">
        </section>
        <button type="submit">Submit</button>
    </form>
    
    <section>
        <div>The result is: </div>
    </section>

    <h1>Here you can See our blogs</h1>

    <section>
        <div class="main-container">
            @foreach ($blogs as $blog )
           <div class="card">
                <p> </p>
                <h3 class="title">{{$loop->iteration}}. {{$blog->title}} </h3>
                <img src="{{asset($blog->image)}}" class="blog-img" alt="">
                <p class="content">{{$blog->content}}</p>
                <button class="btn">Read More</button>
            </div>
            @endforeach
        </div>
    </section>

<script>
    document.getElementById('btn').addEventListener("click", function(){
        const inputField = document.getElementById('name');
        const value = inputField.value; 
        console.log('hello orld');
        const div = document.getElementById('showHere');
      
        div.innerText =  value;
        inputField.value = '';
    });
</script>

</body>
</html>