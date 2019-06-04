@extends('layouts.base')
<body>
    
@section('nav-items')
   <ul class="p-0">

    <li class="nav-items" ><a href="/presidente" class="text-black "><i class="mr-3 fas fa-home text-secondary"></i><span class="d-md-inline">Inicio</span></a>
    <br>
    <br>

        
    {{-- </li>
      <li class="nav-items" ><a href="#menu1" class="text-black cambio" id="button1" data-toggle="collapse" aria-expanded="false"><i class="text-secondary fas fa-user-plus mr-3"></i> <span class="d-md-inline ">Registros</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu1" data-parent="#sidebar">
            <a href="{{ url('personal/registro') }}" class="list-group-item " >Agregar Personal</a>
            {{-- <a href="#menu1sub1" class="list-group-item " >Subitem 1 </a> --}}
            {{-- <a href="#menu1sub1" class="list-group-item " >Subitem 1 </a> --}}
              
{{--        
        </div>
    </li>
 --}}
    @if(auth()->user()->role->Admin)                                    
    <li class="nav-items" ><a href="#menu3" class="text-black cambio" id="button3" data-toggle="collapse" aria-expanded="false"><i class="fas fa-project-diagram text-secondary mr-3"></i> <span class="d-md-inline">Departamentos</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu3" data-parent="#sidebar">
            <a href="{{ url('/presidente')}}" class="list-group-item" >Presidente </a>
            <a href="{{ url('/almacen')}}" class="list-group-item" >Almacen </a>
            <a href="{{ url('/mantenimiento')}}" class="list-group-item" >Mantenimiento </a>
            <a href="{{ url('/personal')}}" class="list-group-item" >Recursos Humanos </a>
            
        
        </div>
    </li>
    @endif
    <li class="nav-items" ><a href="#menu4" class="text-black cambio" id="button3" data-toggle="collapse" aria-expanded="false"><i class="fas fa-clipboard text-secondary mr-3"></i> <span class="d-md-inline">Monitoreos</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu4" data-parent="#sidebar">
            <a href="{{ url('/presidente/monitoreo/personal') }}" class="list-group-item" >Recursos humanos </a>
            <a href="{{ url('/presidente/monitoreo/almacen') }}" class="list-group-item" >Almacen </a>
            <a href="{{ url('/presidente/monitoreo/mantenimiento') }}" class="list-group-item" >Mantenimiento </a>
            {{-- <a href="#menu3sub3" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 </a> --}}
            
        
        </div>
    </li>

    {{-- <li class="nav-items" ><a href="#menu5" class="text-black cambio" id="button4" data-toggle="collapse" aria-expanded="false"><i class="fas fa-file-pdf text-secondary mr-3"></i> <span class="d-md-inline">Reportes</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu5" data-parent="#sidebar">
            <span><a href="#menu4sub4" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 4 </a></span>
            <a href="#menu4sub4" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 4 </a>
            <a href="#menu4sub4" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 4 </a>
            
        
        </div>
    </li> --}}
    </ul>

                    

@endsection
</body>
