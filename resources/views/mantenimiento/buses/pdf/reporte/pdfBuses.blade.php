@extends('mantenimiento.buses.pdf.reporte.layout')

@section('content')
    <table class="table table-hover table-striped" >
        <thead>
            
            <tr>
            <th  scope="col"># </th>
            <th  scope="col"># de la Unidad</th>
            <th  scope="col">Modelo</th>
            <th  scope="col">Kilometraje</th>
            <th  scope="col">Ubicación</th>
            <th  scope="col">Estado</th>
            <th  scope="col">Motivo</th>
            <th  scope="col">Desde</th>
            <th  scope="col">Vin</th>
            <th  scope="col">Conductor</th>
            <th  scope="col">Observación</th>
            </tr>                            
        </thead>
        <tbody>
            {{ $contador = 1 }}
             @forelse($arr['Buses'] as $bus)
             <tr>
             <td><strong>{{ $contador++ }}</strong></td>
                <th scope="row">
                <a data-toggle="tooltip" data-placement="top" title="Modificar Unidad"   style="color: #008a34">{{ $bus->id_bus}}</a>
                </th>
                <td>{{ $bus->modelo}} </td>
                <td><a data-toggle="tooltip" data-placement="top" title="Modificar kilometraje"  style="color: #008a34"> 
                    {{ number_format($bus->kilometraje) }} Km
                </a></td>
                <td> {{ $bus->esOperaciones }}</td>
                <td> @if( $bus->estado == 'Inactivo') Inoperativa @else Operativa @endif
                    @if ($bus->estado == 'Activo' and $bus->fecha_inactivo )
                        En servicio
                    
                    @endif
                </td>
                <td class="text-center"> <span class="text-center @if ($bus->motivo_inactividad == 'a Desincorporar')badge badge-warning
                        @endif"> @if( $bus->estado == 'Inactivo') {{ $bus->motivo_inactividad }} </span>@else ---- @endif</td>        
                <td> @if( $bus->estado == 'Inactivo') {{ $newDate = date("d/m/Y", strtotime($bus->fecha_inactivo))  }}  @endif
                    @if ($bus->estado == 'Activo' and $bus->fecha_inactivo )
                        {{ $newDate = date("d/m/Y", strtotime($bus->fecha_inactivo))  }}
                    @elseif($bus->estado == 'Inactivo') 
                    @else ----
                    @endif
                </td>  
                <td> {{ $bus->vin }}</td>

                <td>@if ($bus->conductor_id == 0)
                    No tiene conductor asignado
                @else
                    {{ $bus->staff->names }} {{  $bus->staff->last_names }}
                    
                @endif
                </td>
                <td> @if( $bus->estado == 'Inactivo') {{ $bus->observacion }} @endif
                    @if ($bus->estado == 'Activo' and $bus->fecha_inactivo )
                        {{ $bus->observacion }}
                    @elseif($bus->estado == 'Inactivo') 
                    @else ----
                    @endif
                </td>        
            </tr>
            @empty
                <h2 class="mt-5"><span class="mt-5">  no hay unidades </span></h4>
            @endforelse
            
        
        </tbody>
    </table>
@endsection