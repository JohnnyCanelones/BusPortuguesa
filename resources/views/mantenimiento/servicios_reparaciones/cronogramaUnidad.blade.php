<body> 
@include('layouts.mantenimiento_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div id="" class='card card2'>
                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Selecciona una unidad</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col"># de la Unidad</th>
                                <th class="text-white" scope="col">Modelo</th>
                                <th class="text-white" scope="col">Estado</th>
                                <th class="text-white" scope="col">Ver Cronograma de la unidad</th>
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($buses as $bus)
                            <tr>
                                <th scope="row">
                                <a style="color: #008a34">{{ $bus->id_bus}}</a>
                                </th>
                                <td>{{ $bus->modelo}} </td>
                                <td> {{ $bus->estado }}</td>
                                <td class="text-center"><a style="color: #008a34" data-toggle="tooltip" data-placement="top" title="Buscar" href="/mantenimiento/cronograma/unidad/{{ $bus->id_bus }}"><h5><i class="fas fa-angle-double-right"></i> </h5></a></td>
                                
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
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>



</body>
