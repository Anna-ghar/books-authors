<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
</head>
<body>
    @include('navigation')

    <div class="container-md" style="margin-top: 30px;">
        <h2>{{ $book->title }}</h2><br>
        <p><strong>Publication year:</strong> {{$book->publication_year}}</p>
        <p><strong>Description:</strong> Description:<br>{{ $book->description }}</p>
        <p><strong>Authors:</strong><br>
            @foreach($book->authors as $author)
                {{$author->first_name}} {{$author->last_name}}
            @endforeach
        </p>
    </div>

</body>
</html>
