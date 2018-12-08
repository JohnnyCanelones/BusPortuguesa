
<body> 
@include('layouts.presidente_base')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">

            <div id="" class='card card2'>
            	  	


                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Monitoreo en el Departamento de Recursos Humanos</h3>
                </div>
                <div class="card-body">
                    <table id="example" class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col">Fecha</th>
                                <th class="text-white" scope="col">Accion</th>
                                <th class="text-white" scope="col">Cantidad agregada</th>
                                <th class="text-white" scope="col">Realizado por</th>
                                <th class="text-white" scope="col">Al producto</th>
                            </tr>

                        </thead>
                        <tbody>
                             @foreach($monitoreos as $monitoreo)
                            <tr>
                                <th scope="row">
                                	{{ $newDate = date("Y/m/d - H:i ", strtotime($monitoreo->fecha_accion))  }} 
                                </th>
                                <td>{{ $monitoreo->accion}}</td>        
                                <td>{{ $monitoreo->stock_added}}</td>        
                                <td> <strong ><a href="#" onclick="buscarUsuario()" class="usuario verde"  data-value='{{ $monitoreo->user_id }}'>{{ $monitoreo->user_id}}</a></td></strong>
                                <td><strong > <a href="#" onclick="buscarProducto()" class="almacen verde"  data-value='{{ $monitoreo->almacen->id }}'>{{ $monitoreo->almacen->nombre_producto}}</a></td></strong>
                            </tr>
                            
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<input id="monitoreos" value="{{ count($monitoreos) }}" hidden="" readonly=""> 
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
        <div class="row">
            <div class="col-sm-6 mb-2"><strong id="mt-1" ></strong></div>
            <div class="col-sm-6 mb-2" id="m-1"></div>
            <div class="col-sm-6 mb-2 "><strong id="mt-2"></strong></div>   
            <div class="col-sm-6 mb-2" id="m-2"></div>   
            <div class="col-sm-6 mb-2"><strong id="mt-3"></strong></div>   
            <div class="col-sm-6 mb-2" id="m-3"></div>   
            <div class="col-sm-6 mb-2"><strong id="mt-4"></strong></div>   
            <div class="col-sm-6 mb-2" id="m-4"></div>   
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

<script type="text/javascript">
    $('#example').DataTable( {
    dom: 'Bfrtip',
    "order": [0, 'desc'],

} );

    setInterval(function() {
    $.get( "/presidente/monitoreos/almacen", function( data ) {
        let cantidad_de_monitoreos = document.getElementById('monitoreos').value
        // let peticionesDom =document.getElementById("totalPeticionesPendientes").value;
        let peticionesActuales = data;
        
        if (cantidad_de_monitoreos != peticionesActuales) {
            location.reload();
        }
    });

}, 5000)



let usuarios = document.getElementsByClassName('usuario');

for (x=0; x <usuarios.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let usuario= usuarios[x];
    
    usuario.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 350);
            $.get( "/presidente/monitoreo/usuario/"+usuario.dataset.value, function( data ) {
                document.getElementById('exampleModalLongTitle').innerHTML =  'Empleado';
                document.getElementById('mt-1').innerHTML =  'Cedula';
                document.getElementById('m-1').innerHTML =  data.nationality+'-'+ data.id;
                document.getElementById('mt-2').innerHTML =  'Nombres';
                document.getElementById('m-2').innerHTML =  data.names;
                document.getElementById('mt-3').innerHTML =  'Apellidos';
                document.getElementById('m-3').innerHTML =  data.last_names;
                document.getElementById('mt-4').innerHTML =  '';
                document.getElementById('m-4').innerHTML =  '';
            });
        
    })
}

function buscarUsuario(){
   let usuarios = document.getElementsByClassName('usuario');

   for (x=0; x <usuarios.length; x++){

        let cantidad_de_monitoreos = document.getElementById('monitoreos').value
        let usuario= usuarios[x];
        
        usuario.addEventListener("click", function(event){
                setTimeout(function(){
            $('#exampleModalLong').modal('show');
            }, 350);
            $.get( "/presidente/monitoreo/usuario/"+usuario.dataset.value, function( data ) {
               document.getElementById('exampleModalLongTitle').innerHTML =  'Empleado';
                document.getElementById('mt-1').innerHTML =  'Cedula';
                document.getElementById('m-1').innerHTML =  data.nationality+'-'+ data.id;
                document.getElementById('mt-2').innerHTML =  'Nombres';
                document.getElementById('m-2').innerHTML =  data.names;
                document.getElementById('mt-3').innerHTML =  'Apellidos';
                document.getElementById('m-3').innerHTML =  data.last_names;
                document.getElementById('mt-4').innerHTML =  '';
                document.getElementById('m-4').innerHTML =  '';
            });
            
        })
    } 
}

let almacen = document.getElementsByClassName('almacen');

for (x=0; x <almacen.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let producto= almacen[x];
    
    producto.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 300);
            $.get( "/presidente/monitoreo/almacen/"+producto.dataset.value, function( data ) {
               document.getElementById('exampleModalLongTitle').innerHTML =  'Producto';

                document.getElementById('mt-1').innerHTML =  'Nombre del producto';
                document.getElementById('m-1').innerHTML =  data.nombre_producto
                
                document.getElementById('mt-2').innerHTML =  'Compatibilidad';
                document.getElementById('m-2').innerHTML =  data.compatibilidad;
                
                document.getElementById('mt-3').innerHTML =  'Cantidad';
                document.getElementById('m-3').innerHTML =  data.cantidad;
                
                document.getElementById('mt-4').innerHTML =  'Ubicacion';
                document.getElementById('m-4').innerHTML =  data.ubicacion;
            });
        
    })
}

function buscarProducto(){
   let almacen = document.getElementsByClassName('almacen');

for (x=0; x <almacen.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let producto= almacen[x];
    
    producto.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 300);
            $.get( "/presidente/monitoreo/almacen/"+producto.dataset.value, function( data ) {
               document.getElementById('exampleModalLongTitle').innerHTML =  'Producto';

                document.getElementById('mt-1').innerHTML =  'Nombre del producto';
                document.getElementById('m-1').innerHTML =  data.nombre_producto
                
                document.getElementById('mt-2').innerHTML =  'Compatibilidad';
                document.getElementById('m-2').innerHTML =  data.compatibilidad;
                
                document.getElementById('mt-3').innerHTML =  'Cantidad';
                document.getElementById('m-3').innerHTML =  data.cantidad;
                
                document.getElementById('mt-4').innerHTML =  'Ubicacion';
                document.getElementById('m-4').innerHTML =  data.ubicacion;
            });
        
    })
}

}


</script>





</body>
