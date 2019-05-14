@extends('layouts.base')

    
@section('nav-items')
   <ul class="p-0">

    <li class="nav-items" ><a href="/personal" class="text-black "><i class="mr-3 fas fa-home text-secondary"></i><span class="d-md-inline">Inicio</span></a>
    <br>
    <br>

     @if(auth()->user()->role->Admin)                                    
    <li class="nav-items" ><a href="#menu6" class="text-black cambio" id="button3" data-toggle="collapse" aria-expanded="false"><i class="fas fa-project-diagram text-secondary mr-3"></i> <span class="d-md-inline">Departamentos</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu6" data-parent="#sidebar">
            <a href="{{ url('/presidente')}}" class="list-group-item" >Presidente </a>
            <a href="{{ url('/almacen')}}" class="list-group-item" >Almacen </a>
            <a href="{{ url('/mantenimiento')}}" class="list-group-item" >Mantenimiento </a>
            <a href="{{ url('/personal')}}" class="list-group-item" >Personal </a>
            
        
        </div>
    </li>
    @endif   
    </li>
      <li class="nav-items" ><a href="#menu1" class="text-black cambio" id="button1" data-toggle="collapse" aria-expanded="false"><i class="text-secondary fas fa-user-plus mr-3"></i> <span class="d-md-inline ">Registros</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu1" data-parent="#sidebar">
            <a href="{{ url('personal/registro') }}" class="list-group-item " >Agregar Personal</a>
           
              
        
        </div>
    </li>

    <li class="nav-items" ><a href="#menu3" class="text-black cambio" id="button3" data-toggle="collapse" aria-expanded="false"><i class="fas fa-clipboard text-secondary mr-3"></i> <span class="d-md-inline">Consultas</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu3" data-parent="#sidebar">
            <span><a href="{{ url('personal/show') }}" class="list-group-item" >Mostrar Personal </a></span>
            <a href="{{ url('personal/show/users') }}" class="list-group-item" >Mostrar Usuarios</a>
            
        
        </div>
    </li>

    <li class="nav-items" ><a href="#menu4" class="text-black cambio" id="button4" data-toggle="collapse" aria-expanded="false"><i class="fas fa-file-pdf text-secondary mr-3"></i> <span class="d-md-inline">Reportes</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu4" data-parent="#sidebar">
            <span><a href="{{ url('personal/pdf') }}" target="_blank" class="list-group-item" >PDF de Personal </a></span>
            <a href="{{ url('personal/users/pdf') }}" target="_blank" class="list-group-item" >PDF de Usuarios</a>
            
            
        
        </div>
    </li>
    </ul>
    
@endsection

