<!doctype html>
<html lang="en">
<head>

    @yield('csrf')
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- include libries(jQuery, bootstrap, fontawesome) -->
    <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <!-- include summernote css/js-->
    <link href="/summernote/dist/summernote.css" rel="stylesheet">

    <script src="/summernote/dist/summernote.min.js"></script>

</head>
<body style="text-align: center;">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Test</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/posts') }}">Posts</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span>
                            @if(Auth::user()->role == 1)
                                (m)
                            @else
                                (a)
                            @endif
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/user/{{ Auth::user()->slug }}">Mijn profiel</a></li>
                            @if(Auth::user()->role == 5)
                                <li><a href="/settings">Instellingen</a></li>
                            @endif
                            <hr style="margin-top: 5px; margin-bottom: 5px">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
    @yield('facebookShare')
    <div class="container" style="text-align: left; margin: 0 auto; width: 700px;">
        <h1>@yield('title')</h1>
        @yield('tags')
        @yield('content')
        @yield('footer')
    </div>

</body>
</html>