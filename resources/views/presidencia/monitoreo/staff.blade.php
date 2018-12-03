
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
                                <th class="text-white" scope="col">Realizado por</th>
                                <th class="text-white" scope="col">Al empleado</th>
                            </tr>

                        </thead>
                        <tbody>
                             @foreach($monitoreos as $monitoreo)
                            <tr>
                                <th scope="row">
                                	{{ $newDate = date("Y/m/d - H:i ", strtotime($monitoreo->fecha_accion))  }} 
                                </th>
                                <td>{{ $monitoreo->accion}}</td>        
                                <td> <strong ><a href="#" onclick="buscarUsuario()" class="usuario verde"  data-value='{{ $monitoreo->user_id }}'>{{ $monitoreo->user_id}}</a></td></strong>
                                <td><strong > <a href="#" onclick="buscarEmpleado()" class="empleado verde"  data-value='{{ $monitoreo->staff->id }}'>{{ $monitoreo->staff->id}}</a></td></strong>
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
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Empleado</h5>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 mb-2"><strong>Cedula</strong></div>
            <div class="col-sm-6 mb-2" id="cedula"></div>
            <div class="col-sm-6 mb-2 "><strong>Nombre</strong></div>   
            <div class="col-sm-6 mb-2" id="nombre">sfsdfsdf</div>   
            <div class="col-sm-6 mb-2"><strong>Apellido</strong></div>   
            <div class="col-sm-6 mb-2" id="apellido"></div>   
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
<script type="text/javascript" src="{{ asset('js/presidencia/monitoreo.js') }}"></script>






</body>
