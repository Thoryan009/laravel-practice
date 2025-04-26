<h1>Another page</h1>
<a href="{{route('home')}}">Home</a>
<a href="{{route('more-data')}}">More Data</a>

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


@foreach ($blogs as $blog )
    <p>{{$blog->title}}</p>
@endforeach