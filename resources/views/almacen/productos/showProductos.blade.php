<body> 
@include('layouts.mantenimiento_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-7">
            <div id="" class='card card2'>
                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Inventario de Productos</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col">Nombre del Producto</th>
                                <th class="text-white" scope="col">Conpatibilidad</th>
                                <th class="text-white" scope="col">Cantidad</th>
                                <th class="text-white" scope="col">Ubicacion</th>
                               
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($productos as $producto)
                            <tr>
                                <th scope="row">
                                    <a href=""  style="color: #008a34">{{ $producto->nombre_producto }}</a>
                                </th>
                                <td>{{ $producto->compatibilidad }} </td>
                                <td> {{ $producto->cantidad }}</td>
                                <td> {{ $producto->ubicacion }}</td>
                                
                            </tr>
                            @empty
                            dfksdflkjs
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
