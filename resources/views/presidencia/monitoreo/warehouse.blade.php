
<body> 
@include('layouts.presidente_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">

            <div id="" class='card card2'>
            	  	


                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Monitoreo de Almacen</h3>
                </div>
                <div class="card-body">
                    <table id="example" class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col">Fecha</th>
                                <th class="text-white" scope="col">Accion</th>
                                {{-- <th class="text-white" scope="col">Producto</th> --}}
                                <th class="text-white" scope="col">Cantidad agregada</th>
                                <th class="text-white" scope="col">Realizado por</th>
                            </tr>

                        </thead>
                        <tbody>
                             @foreach($monitoreos as $monitoreo)
                            <tr>
                                <th scope="row">
                                	{{ $newDate = date("Y/m/d - H:i ", strtotime($monitoreo->fecha_accion))  }} 
                                </th>
                                <td>{{ $monitoreo->accion}},         
                                <strong > <a href="#" onclick="buscarProducto()" class="almacen verde"  data-value='{{ $monitoreo->almacen->id }}'>{{ $monitoreo->almacen->nombre_producto}}</a></strong></td>
                                <td>{{ $monitoreo->stock_added}}</td>        
                                <td> <strong ><a href="#" onclick="buscarUsuario()" class="usuario verde"  data-value='{{ $monitoreo->user_id }}'>{{ $monitoreo->user_id}}</a></td></strong>
                            </tr>
                            
                            @endforeach

                            @foreach($monitoreos2 as $monitoreo)
                            <tr>
                                <th scope="row">
                                    {{ $newDate = date("Y/m/d - H:i ", strtotime($monitoreo->fecha_accion))  }} 
                                </th>
                                <td>{{ $monitoreo->accion}},      
                                <strong > <a href="#" onclick="" class="peticion verde"  data-value='{{ $monitoreo->peticion->id }}'>{{ $monitoreo->peticion->almacen->nombre_producto}}</a></td></strong>
                                <td> --- </td>        
                                <td> <strong ><a href="#" onclick="buscarUsuario()" class="usuario verde"  data-value='{{ $monitoreo->user_id }}'>{{ $monitoreo->user_id}}</a></td></strong>
                            </tr>
                            
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<input id="monitoreos" value="{{ $contador_de_monitoreos }}" hidden="" readonly=""> 
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
        <div class="row" >
            <div class="col-sm-6 mb-2"><strong id="mt-1" ></strong></div>
            <div class="col-sm-6 mb-2" id="m-1"></div>
            <div class="col-sm-6 mb-2 "><strong id="mt-2"></strong></div>   
            <div class="col-sm-6 mb-2" id="m-2"></div>   
            <div class="col-sm-6 mb-2"><strong id="mt-3"></strong></div>   
            <div class="col-sm-6 mb-2" id="m-3"></div>
            <div class="col-sm-6 "><strong id="mt-6"></strong></div>   
            <div class="col-sm-6 " id="m-6"></div>
            <div class="col-sm-6 "><strong id="mt-4"></strong></div>   
            <div class="col-sm-6 " id="m-4"></div>
            <div class="col-sm-6 "><strong id="mt-5"></strong></div>   
            <div class="col-sm-6 " id="m-5"></div>
                 
        </div>
      </div>
      <div class="modal-footer infobox-azul-contenido ">
        <button type="button" class="btn btn-secondary text-white mx-auto d-block" data-dismiss="modal">Cerrar</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/presidencia/monitoreoAlmacen.js') }}"></script>

<script type="text/javascript">
    let peticiones = document.getElementsByClassName('peticion');

for (x=0; x <peticiones.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let peticion= peticiones[x];
    
    peticion.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 300);
            $.get( "/presidente/monitoreo/peticion/"+peticion.dataset.value, function( data ) {
               
               function estado() {
                   if (data['peticion'].estado == 'Aprobada') {
                       return 'badge badge-success'
                    } if(data['peticion'].estado == 'Pendiente') {
                        return 'badge badge-warning2'
                       
                   }else {
                        return 'badge badge-danger'

                   }
               }
                document.getElementById('exampleModalLongTitle').innerHTML =  `Peticion  <span class="${estado()}">${data['peticion'].estado}</span>`;

                // document.getElementById('mt-1').innerHTML =  'Estado';
                // document.getElementById('m-1').innerHTML =  data['peticion'].estado
                
                document.getElementById('mt-1').innerHTML =  'Nombre del producto';
                document.getElementById('m-1').innerHTML =  data['producto'].nombre_producto;
                
                document.getElementById('mt-2').innerHTML =  'Cantidad pedida';
                document.getElementById('m-2').innerHTML =  data['peticion'].cantidad;
                
                
                if (data['peticion'].estado == 'Rechazada') {
                    document.getElementById('mt-5').innerHTML =  'Observacion';
                document.getElementById('m-5').innerHTML =  data['peticion'].observacion;
                }else{
                    document.getElementById('mt-5').innerHTML =  '';
                    document.getElementById('m-5').innerHTML =  '';
                }

                document.getElementById('mt-3').innerHTML =  'Fecha enviada';
                document.getElementById('m-3').innerHTML =  data['peticion'].created_at;
                
                if (data['peticion'].estado != 'Pendiente') {
                    console.log('asasdsad')

                   document.getElementById('mt-4').innerHTML =  'Fecha respuesta';
                    document.getElementById('m-4').innerHTML =  data['peticion'].updated_at; 
                }else {
                    document.getElementById('mt-4').innerHTML =  '';
                    document.getElementById('m-4').innerHTML =  ''; 
                    
                }
            });
        
    })
}

</script>





</body>
