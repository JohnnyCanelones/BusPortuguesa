{{-- Modal --}}
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="top: 20%">
    <div class="modal-content text-center">
      <div class="modal-header text-center mb-2 p-2 " style="display: block; background-color: #008a34">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Agregar nuevo servicio</h5>
      </div>
      <div class="modal-body">
      	<div class="container-fluid">
      		
        <div class="row">
        	<div class="col-sm-12">
        			

	        	<form id="servicio" action="/mantenimiento/servicio" onkeypress="return anular(event)" method="post">
					{{ csrf_field() }}
	        		<div class="row">
									<div class="col-sm-12">
									<div class="alert alert-danger text " role="alert">
											Los datos aquí ingresados no pueden ser<strong> Modificados</strong> 
									</div>
									</div>
												
			            <div class="col-sm-10 mb-2" id="cedula">
			            	<input type="" id="name" name="name" class="form-control">
			            </div>
			             <div class="col-sm-2 mb-2">
			             	<h4><a href="#" id="submit"  class="azul hover"><i class="fas fa-save"></i></a></h4>
			             </div>
	        		</div>
	            
	            
              {{-- <button type="button" type="submit" class="btn btn-primary">Save changes</button> --}}
	        	</form>

        		
        	</div>
        </div>
      	</div>

      </div>
      <div class="modal-footer infobox-azul-contenido ">
        <button type="button" class="btn btn-secondary text-white mx-auto d-block" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
		function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     }
		let submit = document.getElementById('submit')
  		submit.addEventListener('click', function(ev){
  			x = document.getElementById("name").value;

  			// $.post( "/personal/puesto", { occupation_name: x  });
  			$.ajax({
			    type: "POST",
			    url: '/mantenimiento/servicio',
			    data: {  _token: '{{csrf_token()}}', name: x.charAt(0).toUpperCase()+ x.slice(1) },
			    success: function (data) {
            // console.log(data)
            let select = document.getElementById('tipo_servicio')
    				select.innerHTML= "<option></option>";

            for (var i = data.length - 1; i >= 0; i--) {
                var option = document.createElement("option");
                option.text = data[i].name;
                select.add(option);
              
              }
            
  			    x = document.getElementById("name").value = ''

			    },
			    error: function (data, textStatus, errorThrown) {
			        console.log(data);

	    		},
				});
  		
			$('#exampleModalLong').modal('hide');

  		})
	
</script>