@extends('layouts.base')

    
@section('nav-items')
   <ul class="p-0">

    <li class="nav-items" ><a href="/home" class="text-black "><i class="mr-3 fas fa-home text-secondary"></i><span class="d-md-inline">Inicio</span></a>
    <br>
    <br>

        
    </li>
      <li class="nav-items" ><a href="#menu1" class="text-black cambio" id="button1" data-toggle="collapse" aria-expanded="false"><i class="text-secondary fas fa-user-plus mr-3"></i> <span class="d-md-inline ">Registros</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu1" data-parent="#sidebar">
            <a href="{{ url('personal/registro') }}" class="list-group-item " >Agregar Personal</a>
            <a href="#menu1sub1" class="list-group-item " >Subitem 1 </a>
            <a href="#menu1sub1" class="list-group-item " >Subitem 1 </a>
              
        
        </div>
    </li>

    <li class="nav-items" ><a href="#menu3" class="text-black cambio" id="button3" data-toggle="collapse" aria-expanded="false"><i class="fas fa-clipboard text-secondary mr-3"></i> <span class="d-md-inline">Consultas</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu3" data-parent="#sidebar">
            <span><a href="{{ url('personal/show') }}" class="list-group-item" >Mostrar Personal </a></span>
            <a href="#menu3sub3" class="list-group-item" >Subitem 3 </a>
            <a href="#menu3sub3" class="list-group-item" >Subitem 3 </a>
            
        
        </div>
    </li>

    <li class="nav-items" ><a href="#menu4" class="text-black cambio" id="button4" data-toggle="collapse" aria-expanded="false"><i class="fas fa-file-pdf text-secondary mr-3"></i> <span class="d-md-inline">Reportes</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu4" data-parent="#sidebar">
            <span><a href="#menu4sub4" class="list-group-item" >Subitem 4 </a></span>
            <a href="#menu4sub4" class="list-group-item" >Subitem 4 </a>
            <a href="#menu4sub4" class="list-group-item" >Subitem 4 </a>
            
        
        </div>
    </li>
    </ul>
    
@endsection

