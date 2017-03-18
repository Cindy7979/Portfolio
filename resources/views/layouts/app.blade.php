<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <link href="css/component.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="{{ asset('/js/modernizr.custom.js')}}"></script>
    <script src="{{ asset('/js/toucheffects.js')}}"></script>
    <script src="{{ asset('/js/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('/js/scrolling-nav.js')}}"></script>
    <script src="{{ asset('/js/jquery.scrollto.js')}}"></script>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="app">
        <!-- START :: Nav -->
        <nav class="navbar navbar-default navbar-fixed-top page_header" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><img src="/img/title.png"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                            <li class="hidden">
                                <a class="page-scroll" href="#page-top"></a>
                            </li>

                            @foreach ($menus as $menu) 
                                @if ($menu->type == 1)
                                    <li>
                                        <a class="page-scroll" href="{{ $menu->slug }}">{{$menu->title}}</a>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- END :: Nav -->

        @yield('content')
        <div class="popup">
            <div class="pop_inner">
                <a class="btn_close">X</a>
                <div class="popup_content">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page_footer">
      <div class="container">
        <p>Made with ♥ in New Zealand.</p>
        <p>© 2017 Cindy.</p>
        <span><a href="{{ url('/login') }}" class="btn btn-default btn-xs">LOGIN</a></span>
      </div>
    </footer>
</body>
</html>
