@include('layouts.mantenimiento_base')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="row mb-5 card2 mt-3" style="background-color:">
                <div class=" col-sm-12 col-md-4 mb-3 " >
                    <div class="row">
                        <div class="col-sm-3 p-0  ">
                            <div class="card p-2 infobox-azul-icono" >
                                <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-briefcase"></i></h3>
                            </div>
                            
                        </div>
                        <div class="col-sm-7 p-0 "  >
                           <div class="card p-3  infobox-azul-contenido" >
                               <h5 class="text-white text-center">Repuestos <br>Pendientes <span class="timer badge badge-secondary" data-from="0" data-to=""></span></h5>
                           </div>
                        </div>
                    </div>



                </div>
                 <div class=" col-sm-12 col-md-4 mb-3" >
                    <div class="row">
                        <div class="col-sm-3 p-0  ">
                            <div class="card p-2 infobox-verde-icono" >
                                <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-users"></i></h3>
                                
                            </div>
                            
                        </div>
                        <div class="col-sm-7 p-0 "  >
                           <div class="card p-3 infobox-verde-contenido" >
                               <h5 class="text-white text-center">Buses <br>Activos <span class="timer badge badge-secondary" data-from="0" data-to="{{ $busesActivos }}"></span></h5>
                           </div>
                        </div>
                    </div>

                </div>
                 <div class=" col-sm-12 col-md-4 mb-3" >
                    <div class="row">
                        <div class="col-sm-3 p-0  ">
                            <div class="card p-2 infobox-amarillo-icono" >
                                <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-bars"></i></h3>
                                
                            </div>
                            
                        </div>
                        <div class="col-sm-7 p-0 "  >
                           <div class="card p-3 infobox-amarillo-contenido" >
                               <h5 class="text-white text-center">Buses <br>Inactivos <span class="timer badge badge-secondary" data-from="0" data-to="{{ $busesInactivos }}"></span></h5>
                               
                           </div>
                        </div>
                    </div>

                </div>
                
                
            </div>

            <div id="" class="card card2 mt-5">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ asset('plugins/jquery.countTo.js') }}"></script>

<script type="text/javascript">
 $('.timer').countTo();
</script>
