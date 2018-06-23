@extends('layouts.base')

@section('nav-items')
   <ul class="p-0">
      <li class="nav-items" ><a href="#menu1" class="text-black cambio" id="button1" data-toggle="collapse" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="d-md-inline">Item 1</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu1" data-parent="#sidebar">
            <span><a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a></span>
            <a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a>
            <a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a>
            
        
        </div>
    </li>

    <li class="nav-items" ><a href="#menu2" class="text-black cambio" id="button2" data-toggle="collapse" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="d-md-inline">Item 2</span><i id="minimize" class="fas fa-window-minimize float-right trans"></i><i id="dropdown" class="fas fa-caret-down float-right"></i> </a>
        <br>
        <br>

        <div class="collapse" id="menu2" data-parent="#sidebar">
            <span><a href="#menu2sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 2 </a></span>
            <a href="#menu2sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 2 </a>
            <a href="#menu2sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 2 </a>
            
        
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