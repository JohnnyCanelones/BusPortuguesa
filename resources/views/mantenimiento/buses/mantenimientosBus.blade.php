<body> 
@include('layouts.mantenimiento_base')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            @if (count($mantenimientos) > 0)
                <div id="" class='card card2 mb-5'>
                    @if ($pagina == 'mantenimientos')
                        <div class="card-header">
                            <a class="text-left" href="/mantenimiento/show/buses" style="color: #008a34"><i class="fas fa-angle-left"></i> Atras</a>

                            <h3 id="hola" class="azul text-center m-3 "> 
                                
                                    Unidad # {{$mantenimientos[0]->bus_id}}</h3>
                                    <div class="row" >
                                        <div class="col-md-4 col-sm-4"></div>
                                        <div class="col-sm-4  mb-2 text-center" >
                                        <a href="/mantenimiento/servicios/bus/{{ $mantenimientos[0]->bus_id }}" class="btn btn-raised mx-auto  bg-verde  btn-primary  text-white p-2 rounded " style="font-size: 21px" target="_blank" data-toggle="tooltip" title="Generar PDF"> <span><i class="fas fa-file-pdf"></i></span></a>
                                            {{-- (*) la cantidad para aceites y liquidos seran expresados en litros --}}
                                        <div class="col-sm-4"></div>
                                        
                                    </div>
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
                                        <a class="tipo_mantenimiento" data-value="{{ $mantenimiento }}" data-toggle="tooltip" data-placement="top" title="Ver todos los {{ $mantenimiento }}" href="/mantenimiento/servicio/bus?tipo_servicio={{$mantenimiento}}&bus={{$mantenimientos[0]->bus_id}}"  style="color: #008a34">{{ $mantenimiento}}</a>
                                        </th>
                                        <td class="text-center value"  data-value="{{ count($value)}}">{{ count($value)}} </td>
                                            
                                    </tr>
                                    @empty
                                    
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        
                        <div class="card-footer">
                            <a class="btn bg-verde text-white"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Ver grafica
                            </a>
                            <div class="collapse mt-3" id="collapseExample">
                                <div class="">
                                    <canvas id="myChart"></canvas>

                                </div>
                            </div>
                        </div>
                            
                    @else
                        <div class="card-header">
                            <a class="text-left" href="/mantenimiento/servicio/bus/{{ $mantenimientos[0]->bus_id }}" style="color: #008a34"><i class="fas fa-angle-left"></i> Atras</a>

                            <h3 id="hola" class="azul text-center m-3 ">{{ $mantenimientos[0]->tipo_servicio }} en la Unidad # {{$mantenimientos[0]->bus_id}}</h3>
                        </div>
                        <div class="card-body">
                            <table id="servicio" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                                    <th class="text-center">{{ date("Y/m/d", strtotime($mantenimiento->fecha)) }}</th>
                                    <td class="text-center">{{ number_format($mantenimiento->kilometraje) }} Km</td>
                                        
                                            
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
            @else 
                <div id="" class='card card2 mb-5'>
                    <div class="card-header">
                         <a class="text-left" href="/mantenimiento/show/buses" style="color: #008a34"><i class="fas fa-angle-left"></i> Atras</a>

                    </div>
                    <div class="card-body text-cemter">
                        No hay mantenimientos
                    </div>
                </div>


            @endif
        </div>

    </div>
</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/Chart.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/responsive.bootstrap4.min.js') }}"></script>
 @if ($pagina == 'mantenimientos')<script type="text/javascript" src="{{ asset('js/mantenimiento/graficoTipoMantenimiento.js') }}"></script>
@endif

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
    
    } );
} );
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

 $('#servicio').DataTable( {
    dom: 'Bfrtip',
    "order": [0, 'desc'],

} );

</script>

</body>
 
