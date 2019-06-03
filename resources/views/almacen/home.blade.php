@include('layouts.inventario_base')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 m-5" >

            <div class="row mb-5 card2" style="background-color:">
                 
                
                <div class=" col-sm-12 col-md-4 mb-3" >
                    <div class="row">
                        <div class="col-sm-4 p-0  ">
                            <div class="card p-2 infobox-verde-icono" >
                                <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-check"></i></h3>
                                
                            </div>
                            
                        </div>
                        <div class="col-sm-7 p-0 "  >
                           <div class="card p-3 infobox-verde-contenido" >
                               <h5 class="text-white">Peticiones <br>Aprobadas <span class="timer badge badge-secondary" data-from="0" data-to="{{ $peticionesAprobadas }}"></span></h5>
                           </div>
                        </div>
                    </div>

                </div>
                
                <div class=" col-sm-12 col-md-4 mb-3" >
                    <div class="row">
                        <div class="col-sm-4 p-0  ">
                            <div class="card p-2 infobox-azul-icono" >
                                <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-briefcase"></i></h3>
                            </div>
                            
                        </div>
                        <div class="col-sm-7 p-0 "  >
                            <div class="card p-3 infobox-azul-contenido" >
                                <h5 class="text-white">Peticiones <br>Pendientes Especiales <span class="timer badge badge-secondary" data-from="0" data-to="{{ count($peticionesPendientesEspeciales) }}"></span></h5>
                            </div>
                        </div>
                    </div>




                </div>
                 <div class=" col-sm-12 col-md-4 mb-3" >
                    <div class="row">
                        <div class="col-sm-4 p-0  ">
                            <div class="card p-2 infobox-amarillo-icono" >
                                <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-bars"></i></h3>
                                
                            </div>
                            
                        </div>
                        <div class="col-sm-7 p-0 "  >
                           <div class="card p-3 infobox-amarillo-contenido" >
                               <h5 class="text-white">Peticiones <br>Pendientes <span class="timer badge badge-secondary" data-from="0" data-to="{{ count($peticionesPendientes) }}" ></span></h5>
                               
                           </div>
                        </div>
                    </div>

                </div>
            </div>
            
            @foreach($peticionesEliminadas as $peticion)
                @if (session('peticionesEliminadas'))
                    <div class="alert alert-danger card2" role="alert">
                       Petición de <strong>{{ $peticion->almacen->nombre_producto }}</strong> ha sido rechazada debido a que el tiempo de respuesta
                       ha expirado
                    </div>
                @endif
            @endforeach

            <div id="" class="card card2 mt-5 mb-5">
                <div class="card-header">Ultimas Peticiones Pendientes</div>

                    <div class="card-body">
                             <div class="row text-center">

                            
                                 
                            <input id="totalPeticionesPendientes" hidden="" readonly="" value="{{ count($peticionesPendientes) }}"></input>
                            @forelse($ultimasPeticiones as $peticion)
                                <div class="col-md-4 mt-3">
                                    <div class="jumbotron p-3 mb-2">
                                        
                                    <strong>Producto: </strong>{{ $peticion->almacen->nombre_producto }}<br>
                                    <strong>Unidad: </strong>{{ $peticion->bus_id }}<br>

                                    <strong>Cantidad: </strong>{{ $peticion->cantidad }} @if($peticion->cantidad == 1) @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litros @endif  @endif <br>   
                                    <strong>Estado: </strong><span class="@if($peticion->estado == "Pendiente")badge badge-warning2 @elseif($peticion->estado == "Rechazada") badge badge-danger @else badge badge-success @endif">{{ $peticion->estado}}</span><br>
                                    <strong>Observacion: </strong>@if($peticion->observacion) {{ $peticion->observacion }} @else --- @endif<br>
                                    <strong>Enviada el: </strong>{{  $newDate = date("d/m/Y", strtotime($peticion->created_at)) }}<br>
                                    @if($peticion->estado == "Aprobada")<strong>Aprobada el: </strong>{{  $newDate = date("d/m/Y", strtotime($peticion->updated_at)) }}
                                    @elseif($peticion->estado == "Rechazada")<strong>Rechazada el: </strong>{{  $newDate = date("d/m/Y", strtotime($peticion->updated_at)) }}
                                    @endif<br>
                                    </div>

                                    
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
                            <strong><a class=""  style="color: #008a34" href="almacen/peticiones/">Ver Todas ({{ count($peticionesPendientes) }}) <i class="fas fa-arrow-right"></i></a></strong>
                        </div>
                    </div>
                </div>
            
            <div id="" class="card card2">
                <div class="card-header">Usuario</div>

                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6 mb-3 text-center">
                          <h6><strong>Cedula:</strong> {{ auth()->user()->staff->nationality }}-{{ auth()->user()->staff->id }}</h6>
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
</div>


<script type="text/javascript" src="{{ asset('plugins/jquery.countTo.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>


<script type="text/javascript">
 $('.timer').countTo();
</script>

<script type="text/javascript">
    i= 0



setInterval(function() {
    $.get( "/almacen/peticiones/pendientes", function( data ) {
       
        let peticionesDom =document.getElementById("totalPeticionesPendientes").value;
        let peticionesActuales = data.length;
        console.log(peticionesDom)
        console.log(peticionesActuales)
        if (peticionesDom != peticionesActuales) {
            // location.reload();
        }
    });

}, 5000)
</script>

