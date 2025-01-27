@include('layouts.staff_base')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7 m-5" >
            <div class="row mb-5 card2" style="background-color:">
                 
                <div class=" col-sm-12 col-md-6 mb-3" >
                    <a href="/personal/show" style="text-decoration:none">
                        <div class="row">
                            <div class="col-sm-4 p-0  ">
                                <div class="card p-2 infobox-azul-icono" >
                                    <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-briefcase"></i></h3>
                                </div>
                                
                            </div>
                            <div class="col-sm-7 p-0 "  >
                               <div class="card p-3 infobox-azul-contenido" >
                                   <h5 class="text-white">Empleados <span class="timer badge badge-secondary" data-from="0" data-to="{{ $staff }}"></span></h5>
                               </div>
                            </div>
                        </div>
                        
                    </a>



                </div>
                 <div class=" col-sm-12 col-md-6 mb-3" >
                    <a href="/personal/show/users" style="text-decoration:none">
                    
                        <div class="row">
                            <div class="col-sm-4 p-0  ">
                                <div class="card p-2 infobox-verde-icono" >
                                    <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-users"></i></h3>
                                    
                                </div>
                                
                            </div>
                            <div class="col-sm-7 p-0 "  >
                            <div class="card p-3 infobox-verde-contenido" >
                                <h5 class="text-white">Usuarios <span class="timer badge badge-secondary" data-from="0" data-to="{{ $user }}"></span></h5>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
                {{--  <div class=" col-sm-12 col-md-4 mb-3" >
                    <div class="row">
                        <div class="col-sm-4 p-0  ">
                            <div class="card p-2 infobox-amarillo-icono" >
                                <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-bars"></i></h3>
                                
                            </div>
                            
                        </div>
                        <div class="col-sm-7 p-0 "  >
                           <div class="card p-3 infobox-amarillo-contenido" >
                               <h5 class="text-white">Empleados <span class="timer badge badge-secondary" data-from="0" data-to="1000" data-speed="5000"></span></h5>
                               
                           </div>
                        </div>
                    </div>

                </div> --}}
                
                
            </div>
        
            <div id="" class="card card2">
                <div class="card-header">Usuario</div>

                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6 mb-3 text-center">
                          <h6><strong>Cedula:</strong> {{ auth()->user()->staff->nationality }}-{{ $usuario_activo->staff->id }}</h6>
                       </div>
                       <div class="col-md-6 mb-3 text-center">
                          <h6><strong>Nombres y Apellidos:</strong> {{ ucfirst(strtolower(auth()->user()->staff->names)) }} {{ ucfirst(strtolower(auth()->user()->staff->last_names)) }}</h6>
                       </div>
                       <div class="col-md-6 mb-3 text-center">
                          <h6><strong>Email:</strong> {{ ucfirst(strtolower(auth()->user()->staff->email)) }} </h6>
                       </div>
                       <div class="col-md-6 mb-3 text-center">
                          <h6><strong>Telefono:</strong> {{ ucfirst(strtolower(auth()->user()->staff->phone_number)) }} </h6>
                       </div>
                   </div>
                </div>

                <div class="card-footer">
                    <div class="text-right">
                        <strong><a class=""  style="color: #008a34" href="personal/me/{{ auth()->user()->username }}/">Editar <i class="fas fa-arrow-right"></i></a></strong>
                    </div>
                </div>
                
            </div>
            @include('layouts.license') 

        </div>
    </div>
</div>
 @if (session('status'))
    <script type="text/javascript">
        $(document).ready(function() {
            swal(
            'Listo!',
            '{{ session('status') }}' ,
            'success'
            )
        })
    </script>
@endif
<script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('plugins/jquery.countTo.js') }}"></script>

<script type="text/javascript">
 $('.timer').countTo();
</script>

