<body> 
@include('layouts.inventario_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
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
                    <h3 id="hola" class="azul text-center m-3 ">Inventario de Productos</h3>
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col-md-4 col-sm-4"></div>
                        <div class="col-sm-4  mb-2 text-center" >
                            <a href="/almacen/productos/pdf" class="btn btn-raised mx-auto  bg-verde  btn-primary  text-white p-2 rounded " style="font-size: 21px" target="_blank" data-toggle="tooltip" title="Generar PDF"> <span><i class="fas fa-file-pdf"></i></span></a>
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
                                <th class="text-white" scope="col">Limite cada 6 meses</th>
                                <th class="text-white" scope="col">Ubicacion</th>
                               
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($productos as $producto)
                            <tr>
                                <th scope="row">
                                    <a href="/almacen/producto/{{ $producto->id }}"  style="color: #008a34" data-toggle="tooltip" title="Modificar el producto">{{ $producto->nombre_producto }}</a>

                                </th>
                                <td>{{ $producto->compatibilidad }} </td>
                                <td> <a href="/almacen/inventario/{{ $producto->id }}"  style="color: #008a34" data-toggle="tooltip" title="Modificar Inventario">@if($producto->cantidad == 0) <span class="badge badge-warning2">Sin Inventario</span> @else {{ $producto->cantidad }} @if($producto->cantidad == 1) @if(strpos(strtolower( $producto->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $producto->nombre_producto), 'aceite') !== false)litros @endif  @endif @endif </a></td>
                                <td> {{ $producto->limite }}</td>
                                <td> {{ $producto->ubicacion }}</td>
                                
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
<script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>



<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
    
    } );
} );
    $('#example').tooltip()
</script>



</body>
