@include('layouts.mantenimiento_base')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7 padding ">
            <a href="/mantenimiento/show/buses" style="text-decoration:none">
            <div class="row mb-5 card2 mt-3 " style="background-color:">
                
                 <div class=" col-sm-12 col-md-4 mb-3" >
                    
                        <div class="row">
                            <div class="col-sm-4 p-0  ">
                                <div class="card p-2 infobox-verde-icono" >
                                    <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-bus"></i></h3>
                                    
                                </div>
                                
                            </div>
                            <div class="col-sm-7 p-0 "  >
                            <div class="card p-3 infobox-verde-contenido" >
                                <h5 class="text-white text-center">Buses <br>Operativos <span class="timer badge badge-secondary" data-from="0" data-to="{{ $busesActivos }}"></span></h5>
                            </div>
                            </div>
                        </div>
                </div>
                 <div class=" col-sm-12 col-md-4 mb-3" >

                        <div class="row">
                            <div class="col-sm-4 p-0  ">
                                <div class="card p-2 infobox-amarillo-icono" >
                                    <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-bus"></i></h3>
                                    
                                </div>
                                
                            </div>
                            <div class="col-sm-7 p-0 "  >
                            <div class="card p-3 infobox-amarillo-contenido" >
                                <h5 class="text-white text-center">Buses <br>Inoperativos <span class="timer badge badge-secondary" data-from="0" data-to="{{ $busesInactivos }}"></span></h5>
                                
                            </div>
                            </div>
                        </div>
                </div>
                <div class=" col-sm-12 col-md-4 mb-3 " >
                    
                        <div class="row">
                            <div class="col-sm-4 p-0  ">
                                <div class="card p-2 infobox-azul-icono" >
                                    <h3 style="background-color: transparent;" class="text-center text-white"><i class="fas fa-bus"></i></h3>
                                </div>
                                
                            </div>
                            <div class="col-sm-7 p-0">
                            <div class="card p-3  infobox-azul-contenido" >
                                <h5 class="text-white text-center">Buses a<br>desincorporar <span class="timer badge badge-secondary" data-from="0" data-to="{{ $busesADesincorporar }}"></span></h5>
                            </div>
                            </div>
                        </div>
                        </div>
            </div>
                    </a>
           
{{-- {{$mantenimientos}} --}}
            <div id="" class="card card2 mt-5 mb-5">
                <div class="card-header">Cronograma de mantenimientos de dia de hoy</div>

                    <div class="card-body">
                             <div class="row text-center">
                                 
                            @for ($i = 0; $i < $contador; $i++)
                            
                            
                            <div class="col-md-4 mt-3">
                                <div class="jumbotron p-3 mb-2">
                                    <strong>Fecha: </strong>{{ date("d/m/Y " , strtotime($mantenimientos[$i]->fecha))}}<br>
                                    <span><strong># de la unidad:</strong> {{$mantenimientos[$i]->bus_id}}</span> <br> 
                                    <span><strong>Kilometraje:</strong> {{$mantenimientos[$i]->kilometraje}}</span> <br> 
                                    <strong> Tipo de mantenimiento: </strong><span class="@if($mantenimientos[$i]->tipo_mantenimiento == "Preventivo")badge badge-warning2 @elseif($mantenimientos[$i]->tipo_mantenimiento == "Correctivo") badge badge-danger @else badge badge-success @endif"> {{ $mantenimientos[$i]->tipo_mantenimiento}}</span><br>  
                                    <span><strong>Servicio:</strong> {{$mantenimientos[$i]->tipo_servicio}}</span> <br> 
                                    @foreach ($mantenimientos[$i]->staffs as $mecanico)
                                    <span> <strong> Mecanico/a:</strong> {{$mecanico->names}} {{$mecanico->last_names}} </span><br>
                                        
                                    @endforeach
                      
                                </div>
                            </div>
                                
                                @endfor
                            </div> 

                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <strong><a class=""  style="color: #008a34" href="mantenimiento/cronograma/">Ver Todas({{count($mantenimientos)}}) <i class="fas fa-arrow-right"></i></a></strong>
                        </div>
                    </div>
            </div>
            <div id="" class="card card2 mt-5 mb-5">
                <div class="card-header">Ultimas Peticiones</div>

                    <div class="card-body">
                             <div class="row text-center">

                                 
                            @forelse($ultimasPeticiones as $peticion)
                                <div class="col-md-4 mt-3">
                                    <div class="jumbotron p-3 mb-2">
                                        
                                        <strong>Producto: </strong>{{ $peticion->almacen->nombre_producto }}<br>
                                        <strong>Unidad: </strong>{{ $peticion->bus_id }}<br>
                                        
                                        <strong>Cantidad: </strong> {{ $peticion->cantidad }}@if($peticion->cantidad == 1) @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litros @endif  @endif<br>   
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
                            <strong><a class=""  style="color: #008a34" href="mantenimiento/peticiones/">Ver Todas <i class="fas fa-arrow-right"></i></a></strong>
                        </div>
                    </div>
            </div>
            @include('layouts.license') 
            
            </div>
                
            


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


<script type="text/javascript" src="{{ asset('plugins/jquery.countTo.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>


<script type="text/javascript">
 $('.timer').countTo();
</script>
