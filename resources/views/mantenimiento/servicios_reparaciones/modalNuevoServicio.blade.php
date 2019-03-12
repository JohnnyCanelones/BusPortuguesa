{{-- Modal --}}
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="top: 20%">
    <div class="modal-content text-center">
      <div class="modal-header text-center mb-2 p-2 " style="display: block; background-color: #008a34">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Agregar puesto de trabajo</h5>
      </div>
      <div class="modal-body">
      	<div class="container-fluid">
      		
        <div class="row">
        	<div class="col-sm-12">
        			

	        	<form id="occupations" action="/personal/puesto" method="post">
					{{ csrf_field() }}
	        		<div class="row">
	        			
			            <div class="col-sm-10 mb-2" id="cedula">
			            	<input type="" id="occupation" name="occupation" class="form-control">
			            </div>
			             <div class="col-sm-2 mb-2">
			             	<h4><a href="#" id="submit"  class="azul hover"><i class="fas fa-save"></i></a></h4>
			             </div>
	        		</div>
	            
	            
	        	</form>

        		
        	</div>
        </div>
      	</div>

      </div>
      <div class="modal-footer infobox-azul-contenido ">
        <button type="button" class="btn btn-secondary text-white mx-auto d-block" data-dismiss="modal">Cerrar</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>