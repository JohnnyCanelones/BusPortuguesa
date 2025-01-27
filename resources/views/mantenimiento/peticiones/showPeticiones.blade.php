<body> 
@include('layouts.mantenimiento_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            @if (session('status'))
                <div class="alert alert-success card2" role="alert">
                    {{ session('status') }}
                </div>
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
                    <table id="example" class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                                <td scope="row">
                                   {{ $peticion->almacen->nombre_producto }}

                                </td>
                                <td>{{ $peticion->bus_id }} </td>
                                <td> {{ $peticion->cantidad }}@if($peticion->cantidad == 1) @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $peticion->almacen->nombre_producto), 'aceite') !== false)litros @endif  @endif</td>
                                <td> <span class="@if($peticion->estado == "Pendiente")badge badge-warning2 @elseif($peticion->estado == "Rechazada") badge badge-danger @else badge badge-success @endif">{{ $peticion->estado}}</span></td>
                                <td> @if($peticion->observacion) {{ $peticion->observacion }} @else --- @endif</td>
                                <td>{{  $newDate = date("Y/m/d", strtotime($peticion->created_at)) }}</td>
                                <td>@if($peticion->estado == "Pendiente")--- @else {{  $newDate = date("Y/m/d", strtotime($peticion->updated_at)) }} @endif</td>

                                
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

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/responsive.bootstrap4.min.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        "order": [5, 'desc'],
    
    } );
} );
    $('#example').tooltip()
</script>



</body>
