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
                <td> {{ $producto->cantidad }} @if(strpos(strtolower($producto->nombre_producto), 'aceite') !== false)litros @elseif(strpos(strtolower($producto->nombre_producto), 'cosrrea') !== false) algo2 @endif</td>
                <td> {{ $producto->ubicacion }}</td>
                
            </tr>
            @endforeach
            
            {{--  <tr>
                <th scope="row">
                   aceite

                </th>
                <td> Todas las Unidades </td>
                <td> 5 Litros </td>
                <td> Estante </td>
                
            </tr>
            <tr>
                <th scope="row">
                   aceite

                </th>
                <td> Todas las Unidades </td>
                <td> 5 Litros </td>
                <td> Estante </td>
                
            </tr>
            <tr>
                <th scope="row">
                   aceite

                </th>
                <td> Todas las Unidades </td>
                <td> 5 Litros </td>
                <td> Estante </td>
                
            </tr> --}}
        </tbody>
    </table>
@endsection