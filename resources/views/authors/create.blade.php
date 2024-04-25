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
    <div class="container mt-5">
        <form method="post" action="{{route('authors.store')}}">
            @csrf
            <div class="form-group mb-2">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name" required>
            </div>
            <div class="form-group mb-2">
                <label for="last_name">Last name</label><br>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name" required>
            </div>
            <div class="form-group mb-2">
                <label for="biography"></label>
                <textarea class="form-control" id="biography" name="biography" placeholder="biography" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>


