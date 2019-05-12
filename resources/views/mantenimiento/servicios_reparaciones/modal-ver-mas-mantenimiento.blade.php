{{-- Modal --}}
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="top: 20%">
    <div class="modal-content text-center">
      <div class="modal-header text-center mb-2 p-2 " style="display: block; background-color: #008a34">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h5 class="modal-title text-white" id="exampleModalLongTitle"></h5>
      </div>
      <div class="modal-body">
      	<div class="container-fluid">
      		
        <div class="row">
        	<div class="col-sm-12" >
        			<div id="modal-mantenimiento"></div>    
{{-- 
            <span><strong>Kilometraje:</strong> 6118215 <strong>Km</strong></span> <br> 
            <span> <strong> Tipo de mantenimiento:</strong> preventivo</span><br>   
            <span><strong>Servicio:</strong> Cambio de aceite</span>  <br>
            <span><strong>Mecanico/a:</strong> Johnny Canelones</span>  <br>
            <span><strong>Mecanico/a:</strong> Lysmar Rangel</span>  <br>
            <span><strong>Mecanico/a:</strong> Angelys laCruz </span>  <br>

             --}}
             <div id="mecanicos"></div>
            </div>
        </div>
      	</div>

      </div>
      <div id="footer" class="modal-footer infobox-azul-contenido ">
       
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>