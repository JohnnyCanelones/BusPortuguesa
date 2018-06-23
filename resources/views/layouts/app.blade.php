<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script defer src="{{ asset('fonts/fontawesome/fontawesome.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="header navbar navbar-expand-md navbar-light navbar-laravel zindex-fixed w-100  fixed-top">
            <div class="container-fluid">
            
             <a class="nav-item " href="{{ url('/') }}">
                    <h5 class="text-white user-header text-center"> @guest <i class="fas fa-bus"></i> BUS PORTUGUESA @else @yield('user')  @endguest</h5>
                </a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="text-white"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @yield('burger-sidebar')
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-center">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown text-center">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(auth()->user()->role->Admin)Presidente 
                                    @elseif(auth()->user()->role->Mantenimiento)Jefe de Mantenimiento 
                                    @endif

                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            
        <br>
            
                
        <div class="row">
            @yield('sidebar')
            
                
        
            
        

            
       
       
        <div class="py-4 container" >

        
            <div class=" col-sm-12 mt-5" >
                
                @yield('content')
            </div>

        
        </div>
        </div>
    </div>
        
    <script type="text/javascript" src="{{ asset('plugins/jquery-3.2.1.slim.min.js') }}" ></script>

    <script type="text/javascript" src="{{ asset('plugins/popper.min.js') }}" ></script>
    
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}" ></script>
    
</body>
</html>
