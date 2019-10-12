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
    <nav class="navbar navbar-default header">
        <div class="container">
            <div class="row">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li role="presentation" {{$page == 'main'||$page == 'topics/'.$id?'class=active':''}}><a href="/">Main Page</a></li>
                        <li role="presentation" {{$page == 'topics'||$page == 'topic_edit'?'class=active':''}}><a href="{{route('topics.index')}}">Topics</a></li>
                        <li role="presentation" {{$page == 'blocks'||$page == 'block_edit'?'class=active':''}}><a href="{{route('blocks.index')}}">Blocks</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li >
                            <form class="navbar-form navbar-left" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="log_check" placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pas_check" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary" name="log_in">Sign in</button>
                            </form>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </nav>
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