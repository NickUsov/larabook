<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Larabook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation" {{$page == 'main'?'class=active':''}}><a href="/">Main Page</a></li>
            <li role="presentation" {{$page == 'topics'?'class=active':''}}><a href="{{route('topics.index')}}">Topics</a></li>
            <li role="presentation" {{$page == 'blocks'?'class=active':''}}><a href="{{route('blocks.index')}}">Blocks</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/js/scripts.js"></script>
</body>
</html>