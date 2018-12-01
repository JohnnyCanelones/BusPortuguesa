<head>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert/sweetalert.css') }}"> --}}


</head>

<body> 
@include('layouts.inventario_base')
<div class="container">
    
    
      <div class="row justify-content-center">
        
        <div class="col-sm-12 col-md-7">
            
             
             @if (session('success'))
                <script type="text/javascript">
                    $(document).ready(function() {
                        swal(
                        'Listo!',
                        '{{ session('success') }}' ,
                        'success'
                        )
                    })
                </script>
            @endif

          

            <div id="" class='card card2'>

        
                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Peticiones</h3>
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col-md-4 col-sm-4"></div>
                        <div class="col-sm-4  mb-2 text-center" >
                            
                            {{-- (*) la cantidad para aceites y liquidos seran expresados en litros --}}
                        <div class="col-sm-4"></div>
                        
                    </div>
                    </div>
                    <table id="example" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col">Nombre del Producto</th>
                                <th class="text-white" scope="col"># de la Unidad</th>
                                <th class="text-white" scope="col">Cantidad</th>
                                <th class="text-white" scope="col">Estado</th>
                                <th class="text-white sorting_desc" scope="col">Fecha Enviada</th>
                                <th class="text-white" scope="col">Acciones</th>

                                

                               
                            </tr>

                        </thead>
                        <tbody id="peticionesPendientes">
                            <input id="totalPeticionesPendientes" hidden="" readonly="" value="{{ count($peticionesPendientes) }}"></input>
                            @forelse($peticionesPendientes as $peticion)
                            <tr id="body">
                                <td scope="row" id="{{ $peticion->id }}">
                                   {{ $peticion->almacen->nombre_producto }}

                                </td>
                                <td>{{ $peticion->bus_id }} </td>
                                <td> {{ $peticion->cantidad }} @if($peticion->cantidad == 1) @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litros @endif  @endif</td>
                                <td> <span class="@if($peticion->estado == "Pendiente")badge badge-warning2 @elseif($peticion->estado == "Rechazada") badge badge-danger @else badge badge-success @endif">{{ $peticion->estado}}</span></td>
                                <td>{{  $newDate = date("d/m/Y", strtotime($peticion->created_at)) }}</td>
                                <td class="text-center">
                                    <a    class="btn success aceptar"  onclick="modal()" data-value="{{ $peticion->id }}" data-toggle="tooltip" title="Aprobar Peticion"><i class="fas fa-check"></i></a> 
                                    <a href="/almacen/rechazar/peticion/{{ $peticion->id }}" class="btn denied" data-toggle="tooltip" title="Rechazar Peticion"><i class="fas fa-times"></i></a></td>
                                        

                                
                            @empty
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>
        <div class="col-sm-12 col-md-7">

            <div id="" class='card card2'>


                   
                    <div class="card-body">
                        <div class="row" >
                            <div class="col-md-4 col-sm-4"></div>
                            <div class="col-sm-4  mb-2 text-center" >
                                
                                {{-- (*) la cantidad para aceites y liquidos seran expresados en litros --}}
                            <div class="col-sm-4"></div>
                            
                        </div>
                        </div>
                        <table id="example2" class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                          <thead>
                                <tr class="text-white" style="background-color: #003286e8">
                                    <th class="text-white" scope="col">Nombre del Producto</th>
                                    <th class="text-white" scope="col"># de la Unidad</th>
                                    <th class="text-white" scope="col">Cantidad</th>
                                    <th class="text-white" scope="col">Estado</th>
                                    <th class="text-white" scope="col">Observacion</th>
                                    <th class="text-white sorting_desc" scope="col">Fecha Enviada</th>
                                    <th class="text-white sorting_desc" scope="col">Fecha Respuesta</th>
                                    

                                   
                                </tr>

                            </thead>
                            <tbody>
                                @forelse($peticiones as $peticion)
                                <tr>
                                    <td scope="row" >
                                       {{ $peticion->almacen->nombre_producto }}

                                    </td>
                                    <td>{{ $peticion->bus_id }} </td>
                                    <td> {{ $peticion->cantidad }} @if($peticion->cantidad == 1) @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litros @endif  @endif</td>
                                    <td> <span class="@if($peticion->estado == "Pendiente")badge badge-warning2 @elseif($peticion->estado == "Rechazada") badge badge-danger @else badge badge-success @endif">{{ $peticion->estado}}</span></td>
                                    <td> @if($peticion->estado == "Pendiente") ---  @elseif($peticion->estado == "Rechazada"){{ $peticion->observacion }}  @else --- @endif</td>
                                    <td>{{  $newDate = date("d/m/Y", strtotime($peticion->created_at)) }}</td>
                                    <td>{{  $newDate = date("d/m/Y", strtotime($peticion->updated_at)) }}</td>
                                    
                                </tr>
                                @empty
                                  No hay datos en el inventario
                                @endforelse
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

    </div>
    
</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> --}}
{{-- <script type="text/javascript">
    // $(document).ready(function() {
        let i =0 
        setInterval(function(){
            console.log(i++ )
            // $("#peticionesPendientes").load('peticiones #body');
        },5000)
// });
</script> --}}
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>
{{-- <script type="text/javascript"  src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('js/almacen/peticiones.js') }}"></script>





</body>
