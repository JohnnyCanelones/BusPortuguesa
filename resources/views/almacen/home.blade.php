@include('layouts.inventario_base')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 m-5" >
            <div class="row mb-5 card2" style="background-color:">
                 
                <div class=" col-sm-12 col-md-4 mb-3" >
                    <div class="row">
                        <div class="col-sm-3 p-0  ">
                            <div class="card p-2 infobox-azul-icono" >
                                <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-briefcase"></i></h3>
                            </div>
                            
                        </div>
                        <div class="col-sm-7 p-0 "  >
                           <div class="card p-3 infobox-azul-contenido" >
                               <h5 class="text-white">Productos <br>en Almacen <span class="timer badge badge-secondary" data-from="0" data-to="{{ $productos }}"></span></h5>
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
                               <h5 class="text-white">Penticiones <br>Aprobadas <span class="timer badge badge-secondary" data-from="0" data-to="{{ $peticionesAprobadas }}"></span></h5>
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
                               <h5 class="text-white">Penticiones <br>Pendientes <span class="timer badge badge-secondary" data-from="0" data-to="{{ $peticionesPendientes }}" ></span></h5>
                               
                           </div>
                        </div>
                    </div>

                </div>
                
                
            </div>
            <div id="" class="card card2 mt-5 mb-5">
                <div class="card-header">Ultimas Peticiones Pendientes</div>

                    <div class="card-body">
                             <div class="row text-center">
                                 
                            @forelse($ultimasPeticiones as $peticion)
                                <div class="col-md-4 mt-3">
                                    <strong>Producto: </strong>{{ $peticion->almacen->nombre_producto }}<br>
                                    <strong>Unidad: </strong>{{ $peticion->bus_id }}<br>

                                    <strong>Cantidad: </strong>{{ $peticion->cantidad }} @if($peticion->cantidad = 1) @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litros @endif  @endif <br>   
                                    <strong>Estado: </strong><span class="@if($peticion->estado == "Pendiente")badge badge-warning2 @elseif($peticion->estado == "Rechazada") badge badge-danger @else badge badge-success @endif">{{ $peticion->estado}}</span><br>
                                    <strong>Observacion: </strong>@if($peticion->observacion) {{ $peticion->observacion }} @else --- @endif<br>
                                    <strong>Enviada el: </strong>{{  $newDate = date("d/m/Y", strtotime($peticion->created_at)) }}<br>
                                    @if($peticion->estado == "Aprobada")<strong>Aprobada el: </strong>{{  $newDate = date("d/m/Y", strtotime($peticion->updated_at)) }}
                                    @elseif($peticion->estado == "Rechazada")<strong>Rechazada el: </strong>{{  $newDate = date("d/m/Y", strtotime($peticion->updated_at)) }}
                                    @endif<br>
                                    
                                </div>
                            @empty
                            <div class="col-sm-12">
                                No Hay Peticiones
                            </div>

                            @endforelse
                             </div> 

                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <strong><a class=""  style="color: #008a34" href="almacen/peticiones/">Ver Todas <i class="fas fa-arrow-right"></i></a></strong>
                        </div>
                    </div>
                </div>
        
            <div id="" class="card card2">
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

