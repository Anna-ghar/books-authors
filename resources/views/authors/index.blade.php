<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>
<body>
    @include('navigation')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <a href="{{route('authors.create')}}" class="btn btn-primary mb-3">Add Author</a>
                </div>
                <div class="col-auto">
                    <form action="{{ route('authors.search') }}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input class="form-control" type="text" name="search" placeholder="Search authors">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            @if (count($authors) > 0)
                @foreach ($authors as $author)
                    <div class="col-sm-3"
                         style="background-color:#edf2f7; margin: 10px; border-radius: 20px; padding: 20px">
                        <p>Name: {{$author->first_name}} {{$author->last_name}}</p><br>
                        <p>Books:<br>
                            @foreach($author->books as $book)
                                {{$book->title}}<br>
                            @endforeach
                        </p><br>
                        <a href="/public/authors/{{$author->id}}" class="btn btn-outline-info">Show</a>
                        <a href="/public/authors/{{$author->id}}/edit/" class="btn btn-outline-dark">Edit</a><br><br>
                        <form method='post' action="{{route('authors.destroy',$author->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                @endforeach
        </div>
        @endif
    </div>
</body>
</html>
