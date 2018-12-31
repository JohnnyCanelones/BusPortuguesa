@extends('almacen.layout')

@section('content')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="" >Nombre del Producto</th>
                <th class="" >Compatibilidad</th>
                <th class="" >Cantidad</th>
                <th class="" >Ubicacion</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <th scope="row">
                   {{ $producto->nombre_producto }}

                </th>
                <td>{{ $producto->compatibilidad }} </td>
                <td> @if($producto->cantidad == 0) <span class="badge badge-warning">Sin Stock</span> @else {{ $producto->cantidad }} @if($producto->cantidad == 1) @if(strpos(strtolower( $producto->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $producto->nombre_producto), 'aceite') !== false)litros @endif  @endif @endif</td>
                <td> {{ $producto->ubicacion }}</td>
                
            </tr>
            @endforeach
            
        
        </tbody>
    </table>
@endsection