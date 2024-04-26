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
                        <a href="{{route('books.create')}}" class="btn btn-primary mb-3">Add Book</a>
                    </div>
                    <div class="col-auto">
                        <form method="get" action="{{ route('books.index') }}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="Search authors" value="{{ request()->input('search') }}">
                                <button type="submit" class="btn btn-outline-secondary">Search</button>
                                @if(request()->has('search'))
                                    <a href="{{ route('books.index') }}" class="btn btn-outline-danger">Clear</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
        @if (count($books) > 0)

                @foreach ($books as $book)
                    <div class="col-sm-3" style="background-color:#edf2f7; margin: 10px; border-radius: 20px; padding: 20px;">
                        <p><b>Title:</b> {{ $book->title }}</p>
                        <p><b>Authors:</b><br>
                            @foreach ($book->authors as $author)
                                {{ $author->first_name }} {{ $author->last_name }}<br>
                            @endforeach
                        </p>
                        <a href="books/{{ $book->id }}" class="btn btn-outline-info">Show</a>
                        <a href="books/{{ $book->id }}/edit/" class="btn btn-outline-dark">Edit</a><br><br>
                        <form method="post" action="{{ route('books.destroy', $book->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>

        @endif
            {{ $books->links() }}
    </div>
</body>
</html>
