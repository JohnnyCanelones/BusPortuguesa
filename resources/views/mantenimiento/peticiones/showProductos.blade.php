<body> 
@include('layouts.inventario_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-7">
            @if (session('status'))
                <div class="alert alert-success card2" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div id="" class='card card2'>


                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Productos Disponibles</h3>
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
                                <th class="text-white" scope="col">Compatibilidad</th>
                                <th class="text-white" scope="col">Cantidad</th>
                                <th class="text-white" scope="col">Ubicacion</th>
                                <th class="text-white" scope="col">Accion</th>

                               
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($productos as $producto)
                            <tr>
                                <th scope="row">
                                   {{ $producto->nombre_producto }}

                                </th>
                                <td>{{ $producto->compatibilidad }} </td>
                                <td> {{ $producto->cantidad }} @if(strpos(strtolower($producto->nombre_producto), 'aceite') !== false)litros @elseif(strpos(strtolower($producto->nombre_producto), 'cosrrea') !== false) algo2 @endif</td>
                                <td> {{ $producto->ubicacion }}</td>
                                <td> <a href="peticion/{{ $producto->id }}" style="color: #008a34">Pedir</a> </td>
                                
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
    
    } );
} );
    $('#example').tooltip()
</script>



</body>
