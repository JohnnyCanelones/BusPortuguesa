@extends('mantenimiento.reportes.layout')

@section('content')
    <table class="table table-hover table-striped">
        <thead>
            
            <tr>
                <th class="" >Fecha</th>
                <th class="" ># de la Unidad</th>
                <th class="" >kilometraje</th>
                <th class="" >Mantenimiento</th>
                <th class="" >Mecanicos</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($arr['mantenimientos'] as $mantenimiento  )
            <tr>
                <th scope="row">
                   {{ date("d/m/Y " , strtotime($mantenimiento->fecha))}}

                </th>
                <td>{{$mantenimiento->bus_id}}</td>
                <td>{{$mantenimiento->kilometraje}}</td>
                <td>
                    {{$mantenimiento->tipo_mantenimiento}} || <br>
                    {{$mantenimiento->tipo_servicio}}
                </td>
                <td> @foreach ($mantenimiento->staffs as $mecanico)
                    <strong>{{$mecanico->nationality}}{{$mecanico->id}}</strong> {{$mecanico->names}} {{ $mecanico->last_names}} <br>
                @endforeach </td>
                
            </tr>
            @endforeach
            
        
        </tbody>
    </table>
@endsection