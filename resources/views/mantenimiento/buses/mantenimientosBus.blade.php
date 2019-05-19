<body> 
@include('layouts.mantenimiento_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div id="" class='card card2 mb-5'>
                @if ($pagina == 'mantenimientos')
                <div class="card-header">
                    <a class="text-left" href="/mantenimiento/show/buses" style="color: #008a34"><i class="fas fa-angle-left"></i> Atras</a>

                    <h3 id="hola" class="azul text-center m-3 "> @if (count($mantenimientos) > 0)
                        
                            Unidad # {{$mantenimientos[0]->bus_id}}</h3>
                    @endif 
                </div>
                <div class="card-body">
                    <table id="example" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col">Tipo de servicio</th>
                                <th class="text-white" scope="col">Veces</th>
                                
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($tipo_servicios as $mantenimiento => $value)
                            <tr >
                                <th scope="row">
                                <a data-toggle="tooltip" data-placement="top" title="Ver todos los {{ $mantenimiento }}" href="/mantenimiento/servicio/bus?tipo_servicio={{$mantenimiento}}&bus={{$mantenimientos[0]->bus_id}}"  style="color: #008a34">{{ $mantenimiento}}</a>
                                </th>
                                <td class="text-center">{{ count($value)}} </td>
                                       
                            </tr>
                            @empty
                            
                            @endforelse
                        </tbody>
                    </table>
                </div>
                    
                @else
                <div class="card-header">
                    <a class="text-left" href="/mantenimiento/servicio/bus/{{ $mantenimientos[0]->bus_id }}" style="color: #008a34"><i class="fas fa-angle-left"></i> Atras</a>

                    <h3 id="hola" class="azul text-center m-3 ">{{ $mantenimientos[0]->tipo_servicio }} en la Unidad # {{$mantenimientos[0]->bus_id}}</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col">Fecha</th>
                                <th class="text-white" scope="col">Kilometraje</th>
                                {{-- <th class="text-white" scope="col">Tipo de servicio</th>
                                <th class="text-white" scope="col">Veces</th> --}}
                                
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($mantenimientos as $mantenimiento)
                            <tr >
                            <th class="text-center">{{ $mantenimiento->fecha }}</th>
                            <td class="text-center">{{ $mantenimiento->kilometraje }} Km</td>
                                
                                       
                            </tr>
                            @empty
                            
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <a class="btn bg-verde text-white"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        generar Pdf por fechas
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="">
                            @include('mantenimiento.buses.fechasDesdeHasta')
                            
                        </div>
                    </div>
                </div>
                @endif
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
    
    } );
} );
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>



</body>
