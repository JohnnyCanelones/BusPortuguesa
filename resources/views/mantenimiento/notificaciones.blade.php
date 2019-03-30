<div class="">
@forelse ($peticionesEliminadas as $peticion)
    <div class="col-sm-11 p-0  mx-auto d-block">
    <a >

      <div class="jumbotron p-2 notificaciones2">
        <strong>Producto: </strong>{{ $peticion->almacen->nombre_producto }}<br>
        <strong>Estado: </strong><span class="@if($peticion->estado == "Pendiente")badge badge-warning2 @elseif($peticion->estado == "Rechazada") badge badge-danger @else badge badge-success @endif">{{ $peticion->estado}}</span><br>
        <strong>Observacion: </strong>@if($peticion->observacion) {{ $peticion->observacion }} @else --- @endif<br>
        <strong>Rechazada el: </strong>{{  $newDate = date("d/m/Y", strtotime($peticion->updated_at)) }}<br>
      </div>
    </div>
    </a>
    @empty
        
    @endforelse  
    
</div>