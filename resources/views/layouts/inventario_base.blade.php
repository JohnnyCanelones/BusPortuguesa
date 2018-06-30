@extends('layouts.base')
<body>
    
@section('nav-items')
   <ul class="p-0">

    <li class="nav-items" ><a href="/home" class="text-black "> <span class="d-md-inline"><i class="fas fa-home"></i> Inicio</span></a>
    <br>
    <br>

        
    </li>
      <li class="nav-items" ><a href="#menu1" class="text-black cambio" id="button1" data-toggle="collapse" aria-expanded="false"><i class="fas fa-user-plus"></i> <span class="d-md-inline">Registros</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu1" data-parent="#sidebar">
            <a href="personal/registro" class="list-group-item" >Agregar Personal</a>
            <a href="#menu1sub1" class="list-group-item" >Subitem 1 </a>
            <a href="#menu1sub1" class="list-group-item" >Subitem 1 </a>
            
        
        </div>
    </li>

    <li class="nav-items" ><a href="#menu3" class="text-black cambio" id="button3" data-toggle="collapse" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="d-md-inline">Item 3</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu3" data-parent="#sidebar">
            <span><a href="#menu3sub3" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 </a></span>
            <a href="#menu3sub3" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 </a>
            <a href="#menu3sub3" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 </a>
            
        
        </div>
    </li>

    <li class="nav-items" ><a href="#menu4" class="text-black cambio" id="button4" data-toggle="collapse" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="d-md-inline">Item 4</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu4" data-parent="#sidebar">
            <span><a href="#menu4sub4" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 4 </a></span>
            <a href="#menu4sub4" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 4 </a>
            <a href="#menu4sub4" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 4 </a>
            
        
        </div>
    </li>
    </ul>

                    

@endsection
</body>
