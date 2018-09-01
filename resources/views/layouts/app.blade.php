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
    {{-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css">

</head>

    

<body >
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
                            
                        @else
                            <li class="nav-item dropdown text-center">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(auth()->user()->role->Admin) @if(auth()->user()->staff->genre == "Masculino")Presidente @else Presidenta @endif
                                    
                                    @elseif(auth()->user()->role->Mantenimiento) @if(auth()->user()->staff->genre == "Masculino")Jefe @else Jefa @endif de Mantenimiento
                                    
                                    @elseif(auth()->user()->role->Operaciones) @if(auth()->user()->staff->genre == "Masculino")Jefe @else Jefa @endif de Operaciones 
                                    
                                    @elseif(auth()->user()->role->Personal) @if(auth()->user()->staff->genre == "Masculino")Jefe @else Jefa @endif de Recursos Humanos 
                                    
                                    @elseif(auth()->user()->role->Inventario) @if(auth()->user()->staff->genre == "Masculino")Jefe @else Jefa @endif de Inventario
                                    
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
            
                
            @yield('sidebar')
            
                
        
            
        

            
       
       

        
            {{-- <div class=" col-sm-12 mt-5 " >
                
                @yield('content')
            </div> --}}

        
        </div>
        </div>
    </div>
        
    <script type="text/javascript" src="{{ asset('plugins/jquery-3.2.1.slim.min.js') }}" ></script>
    
    <script type="text/javascript" src="{{ asset('plugins/popper.min.js') }}" ></script>
   
    {{-- <script type="text/javascript" src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}" ></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-design/js/mdb.min.js') }}" ></script> --}}
    
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

    @yield('js-content')
    
</body>
</div>
</html>
