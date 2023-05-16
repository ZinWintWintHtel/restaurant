<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
</head>
<body>
    <form action="{{url('/test/search')}}" method="get">
        @csrf
        <input type="text" name="sde">
        <input type="submit" value="submit">



    </form>
    <a href="</a>
</body>
</html>