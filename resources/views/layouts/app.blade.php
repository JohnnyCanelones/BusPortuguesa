<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOgAAADZCAMAAAAdUYxCAAAAY1BMVEX///8AAAClpaW8vLxQUFCtra3Y2NjR0dHy8vLs7OyUlJT8/Pzn5+eXl5d3d3fj4+NfX1/GxsZxcXGHh4eNjY1kZGREREQiIiIaGhorKytKSkpra2ufn58cHBy6urr29vY0NDRyrDl6AAAEYElEQVR4nO3d63aqMBCGYaKFgqCIpx606v1fZYtd2+2BaCaZJAP93r+wOjzVqkU0SeJSmUxUoCY/w+JUVcU4lPK3cVFVwZl1Fhb5r6wOy2w2cZxKbZpw1CJdx2K2rdMiCLNcLWIy2xarAA9Ms+jMtsXMt1MEs23xR5x+pavYuOtWvpzBXgWZNvHCLKexXfdNPTz6lrvYqq52/FKBt2fblNtJfRzap5btiYOYH5GWxPHKfhR10pJPaTE9INRh1H1bydBtTGdIKJ/U5nVfSCjXq8GDfOiBBWr1yi8olOe1YGXxFxoauuU4aZbaTA4MVam7s573ATp3P2PWWA0ODVWNq7M+9gN6dL1Ja7u5waHKEVpZjg0PVW4PvNbQ8LlBi9iHb57b6Xu7J9EoOT2VlrGPnpLT6aPYB0/JxSnoxPzzXP5Zi33stAAFFFDZAQroX4fOxsKaeYKOHH6Sl0aAUgNURoCSA1RGgJIDVEaAkgNURlRomZ+7OQncZ+i9qr7Yf3e9c5+hF1ejjk7vKaYPLH2GXm1s35h5ZBkMVF3dwkOG7h5bhgNVgJ4CVEaAdm0EtA1QGQHatRHQNkBlBGjXRkDbAJURoF0bAW0DVEaAdm0EtA1QGQHatRHQNkBlBGjXRkDbAJURoF0bAW0bEvT6kwaDhc7+zlUp118PN1Ro+2VzZXPxDXHDvHJs1fxeJHfIzt18xr/P0OK/6vn3OvUZSgpQGQFKDlAZAUoOUBkBSg5QGQFKDlAZAUoOUBkBSg5QGQFKDlAZAUoOUBn5gjJ8vT9vqSfo8UVYR09Q6QEKKKCyAxRQQGUHKKCAyg5Qe+h8Ojk1tVs9zqrnM9mhn+l57a46/fQFo89khr432eUuWfPuE0iZyQy9W4nNdg05QmYzeaEdq3Z5X3PMcCYrtHN1Ms9S05mcUM0qbF6lxjMZoR+adfWqD39O85mM0Ey3Y+YPaj6TD6pft9Vy3VmDCDP5oGP9nmNfUMJMQAEFFFBAARUNXeW6HfOV8hRhJh9Uvep2fPXlpMxkhM40v958drsnX+YzGaG6VcG9rmtuPJMT+tK934tPqPFMTqj66NrN43+jlJmsUPV+v5f304CGM3mh6i25Wv2mTN48M41nMkOVWlfnj8EfqrVPIG0mO1SpZfZ6Klv6gtnM9ACVGaCAAio7QAcmdXGWAV71cPVWPvfoy2MfvnnaMxFm0IBXY7g1d4Mm+Ta2wKytozNJil5It5p3i4cm5XD+SOtNbMjjNjWL86f8ENvyqIPzn+dto+dDz9lPIQzx9WE5QAG1CVBA2QMUUJsABZQ9QAG1CVBA2QMUUJsADQdNJgGcBOmEy3VX+mV4CBuHN3xK05OrXx6/X2lheAxOJyBN39hacKk62pvdpAs3qNmv82vPpeqqMTkE3YWnppldFNvwiHQZXIHs6jSTaq9X5uqp1O1++9vze693Z5JUD+++nwXLOyF58fBD8o3mYmXuUu0RJE4XElxW6p9PrZ5WvgG5Qm4rmrGJpgAAAABJRU5ErkJggg==" rel="icon">
    

    <title>@yield('title','BusPortuguesa')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}" defer></script>

    <!-- Fonts -->
    <script defer src="{{ asset('fonts/fontawesome/fontawesome.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-material-design.min.css') }}" rel="stylesheet">
  
  <link href="{{ asset('plugins/jquery-datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/jquery-datatables/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">

</head>

    

<body >
    <div id="app">
        <nav class="header navbar navbar-expand-md navbar-light navbar-laravel zindex-fixed w-100  fixed-top">
            <div class="container-fluid">
            
             <a class="nav-item " href="{{ url('/mantenimiento') }}">
                    <h5 class="text-white user-header text-center"> @guest <i class="fas fa-bus"></i> BUS PORTUGUESA @else @yield('user')  @endguest</h5>
                </a>
               
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                   @guest
                   @else
                        @if(auth()->user()->role->Mantenimiento)
                        
                        <span id= "notificacion2" class=" badge badge-secondary notificacicion-icono2"></span>
                        @endif                    
                       
                   @endguest
                       
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
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            
                        @else
                            @if(auth()->user()->role->Mantenimiento)

                                <li class="nav-item dropdown text-center">
                                    <a id="navbarDropdown1" class="nav-link  text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{-- @if (count($peticionesEliminadas) > 0) --}}
                                            <span id= "notificacion" class="d-none badge badge-secondary notificacicion-icono"></span>
                                            
                                        {{-- @endif --}}
                                        <h5 class="m-0"><i class="fas fa-bell"></i></h5>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right text-center notificaciones row" aria-labelledby="navbarDropdown1" >
                                        @include('mantenimiento.notificaciones')
                                    </div>
                                </li>
                            @endif
                            <li>
                                <li class="nav-item dropdown text-center">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(auth()->user()->role->Admin) @if(auth()->user()->staff->genre == "Masculino")Presidente @else Presidenta @endif
                                    
                                    @elseif(auth()->user()->role->Mantenimiento) @if(auth()->user()->staff->genre == "Masculino")Jefe @else Jefa @endif de Mantenimiento
                                    
                                    @elseif(auth()->user()->role->Operaciones) @if(auth()->user()->staff->genre == "Masculino")Jefe @else Jefa @endif de Bienes 
                                    
                                    @elseif(auth()->user()->role->Personal) @if(auth()->user()->staff->genre == "Masculino")Jefe @else Jefa @endif de Recursos Humanos 
                                    
                                    @elseif(auth()->user()->role->Inventario) @if(auth()->user()->staff->genre == "Masculino")Jefe @else Jefa @endif de Almacen
                                    
                                    @endif

                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
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
        
    <script t   ype="text/javascript" src="{{ asset('plugins/jquery-3.2.1.slim.min.js') }}" ></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> --}}
    
    
    <script type="text/javascript" src="{{ asset('plugins/popper.min.js') }}" ></script>
   
    {{-- <script type="text/javascript" src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}" ></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-design/js/mdb.min.js') }}" ></script> --}}
    
    {{-- <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script> --}}

    <script src="{{ asset('plugins/bootstrap-material-design.min.js') }}"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

    {{-- <script  type="text/javascript" src="{{ asset('/js/manetenimiento/notificaciones.js') }}"></script> --}}
  <script type="text/javascript" src="{{ asset('js/mantenimiento/notificaciones.js') }}"></script>

   

    @yield('js-content')
    
</body>
</div>
</html>
