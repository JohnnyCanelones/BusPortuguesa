@extends('layouts.app')

<button id="toggle-menu" class="transparent btn toggle-menu " style="position:fixed;"><span class="text-white transparent"><i class="fas fa-bars"></i></span></a></button>
@section('user')

@if(auth()->user()->role->Admin) 

@elseif(auth()->user()->role->Mantenimiento)<i class="fas fa-wrench"></i>

@elseif(auth()->user()->role->Operaciones) 

@elseif(auth()->user()->role->Personal)  

@elseif(auth()->user()->role->Inventario) <i class="fas fa-warehouse mr-1"></i> 

@endif
 {{  ucfirst(auth()->user()->staff->names) }} {{ ucfirst(auth()->user()->staff->last_names) }}
@endsection

@section('sidebar')

  


<div class="sidebar mt-1"  id="sidebar1997">
 
    <br>
    

  <div class="card-header justify-content-center">
                    
     <a href="" style="text-decoration:  none !important" class="d-inline-block collapsed "><h5 class="anchor" style=""><span class="verde text-center d-md-inline">BUS</span> <span class="azul  d-md-inline text-center">PORTUGUESA</span></h5></a>   
    </div>
    <br>
    <br>
  <nav>
   @yield('nav-items')


  </nav>
  
</div>
    





@endsection
{{-- <script type="text/javascript" src="{{ asset('plugins/jquery-3.2.1.slim.min.js') }}"></script> --}}

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
