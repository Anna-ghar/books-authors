<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>
<body>
    @include('navigation')

    <div class="container mt-5">
        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$book->title}}" required>
            </div>
            <div class="form-group mb-2">
                <label for="description">Phone Number</label>
                <textarea class="form-control" name="description" id="description"
                          required>{{$book->description}}</textarea>
            </div>
            <div class="form-group mb-2">
                <label for="year">Name</label>
                <input type="text" class="form-control" name="publication_year" id="year"
                       value="{{$book->publication_year}}" required>
            </div>
            <div class="form-group mb-2">
                <label for="authors">Authors</label><br>
                <select multiple name="authors[]" id="authors">
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->first_name . ' ' . $author->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
</body>
</html>

