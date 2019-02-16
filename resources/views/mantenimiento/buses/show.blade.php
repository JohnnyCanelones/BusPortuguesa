<body> 
@include('layouts.mantenimiento_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div id="" class='card card2'>
                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Buses</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col"># de la Unidad</th>
                                <th class="text-white" scope="col">Modelo</th>
                                <th class="text-white" scope="col">Conductor</th>
                                <th class="text-white" scope="col">Estado</th>
                                <th class="text-white" scope="col">Motivo de la inactividad</th>
                                <th class="text-white" scope="col">Inactivo desde</th>
                                <th class="text-white" scope="col">Observación</th>
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($buses as $bus)
                            <tr>
                                <th scope="row">
                                    <a href=""  style="color: #008a34">{{ $bus->id_bus}}</a>
                                </th>
                                <td>{{ $bus->modelo}} </td>
                                <td>{{ $bus->staff->names }} {{  $bus->staff->last_names }}</td>
                                <td> {{ $bus->estado }}</td>
                                <td class="text-center"> <span class="text-center @if ($bus->motivo_inactividad == 'a Desincorporar')badge badge-warning
                                    @endif"> @if( $bus->estado == 'Inactivo') {{ $bus->motivo_inactividad }} </span>@else ---- @endif</td>        
                                <td> @if( $bus->estado == 'Inactivo') {{ $newDate = date("d/m/Y", strtotime($bus->fecha_inactivo))  }} @else ---- @endif</td>        
                                <td> @if( $bus->estado == 'Inactivo') {{ $bus->observacion }} @else ---- @endif</td>        
                            </tr>
                            @empty
                            
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
    
    } );
} );
</script>



</body>
