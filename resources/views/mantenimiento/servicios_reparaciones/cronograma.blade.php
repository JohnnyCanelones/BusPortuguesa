<head>
        {{-- <link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}"> --}}
        {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="{{asset("plugins/select2/select2.min.css")}}"> --}}

</head>
        
  <body>
  @include('layouts.mantenimiento_base')
      
  <style>

    .vermas {
      color: #008a34 !important;
    }
    .cronograma-menu {
      /* background-color: darkgrey !important; */
      background: rgb(0,138,52) !important;
      background: linear-gradient(200deg, rgba(0,138,52,1) 35%, rgba(10,61,134,1) 100%) !important;

      /* background: rgb(0,138,52) !important;
background: radial-gradient(circle, rgba(0,138,52,1) 41%, rgba(10,61,134,1) 79%) !important; */

      border-bottom: 5px solid #0a3d86;
    }
    .cronograma-menu a {
      color: white;
    }
    .hover{
      padding:10px; 
      margin:20px;
      -webkit-transition: all 500ms ease !important;
      -moz-transition: all 500ms ease !important;
      -o-transition: all 500ms ease !important;
    }
    .hover:hover{
  
      /* background-color: #008a34 !important; */
      background-color: #0a3d86 !important;
      /* background: rgb(0,138,52);
      background: linear-gradient(9deg, rgba(0,138,52,1) 28%, rgba(10,61,134,1) 71%); */
      color: white !important;
    }
    .card-body {
      /* background-color: #0a3d86 !important; */
      /* background-color: #008a34 !important; */
       background: rgb(0,138,52) !important;
      background: linear-gradient(200deg, rgba(0,138,52,1) 35%, rgba(10,61,134,1) 100%) !important;


    }
    .pagination2 .page-link {
      border-radius: 0 !important;
      /* border: 1px solid red; */
      /* color: #0a3d86 !important; */
      /* margin: 0 !important; */
    }
    .pagination2 ul {
      justify-content: center;
      background-color: transparent !important;
    }
    .bg-azul{
      background-color: #0a3d86 !important;

    }

    
  </style>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-lg-7">
        <div id="" class="card card2 mb-5">
          <div class="card-header">

            <h3 id="hola" class="azul text-center m-3 ">Cronograma de Mantenimiento</h3>
          </div>
          <div class="card-header cronograma-menu ">
            <div class="row text-center ">
              <div class="col-sm-12 mb-3">
                {{-- {{$arr = [$desde, $hasta]}} --}}
                <form action="/mantenimiento/cronograma/reporte/" method="get ">
                    {{-- @method('get') --}}
                    @if ($menu == 2)
                    <input hidden  class="form-control "  name="desde" id="" value="{{$desde}}">
                    <input hidden  class="form-control "  name="hasta" id="" value="{{$hasta}}">
                        
                    @endif
                    @if ($menu == 3)
                      <input hidden  class="form-control "  name="bus_id" id="date" value="{{$mantenimientos[0]->bus_id}}">
                        
                    @endif
                    @if ($menu == 4 or $menu == 5)
                      <input hidden  class="form-control "  name="tipo_mantenimiento" id="date" value="{{$mantenimientos[0]->tipo_mantenimiento}}">
                        
                    @endif

                    <button type="submit" class="mb-2 btn btn-raised mx-auto  bg-azul  btn-primary  text-white p-2 rounded " style="font-size: 21px" target="_blank" data-toggle="tooltip" title="Generar PDF"> <span><i class="fas fa-file-pdf"></i></span></button>
                </form>

                <h6><a class=" text-white @if ($menu == 1) font-weight-bold" @else " href="/mantenimiento/cronograma" @endif >Todo el Cronograma </a></h6>
                
              </div>
              <div class="col-sm-3">
                <h6><a  class=" text-white @if ($menu == 2) font-weight-bold" @else " href="/mantenimiento/cronograma/fechas" @endif>Cronograma fecha especifica</a></h6>
              </div>
              <div class="col-sm-3">
                <h6><a class=" text-white @if ($menu == 3) font-weight-bold"  @endif " href="/mantenimiento/cronograma/unidades" >Cronograma por # de la unidad</a></h6>
              </div>
              <div class="col-sm-3">
                <h6><a  class=" text-white @if ($menu == 4) font-weight-bold" @else " href="/mantenimiento/cronograma/preventivos" @endif>Cronograma preventivos</a></h6>
              </div>
              <div class="col-sm-3">
                <h6><a  class=" text-white @if ($menu == 5) font-weight-bold" @else " href="/mantenimiento/cronograma/correctivos" @endif>Cronograma correctivos</a></h6>
              </div>
            </div>
          </div>
          @if ($menu == 2)
            @include('mantenimiento.servicios_reparaciones.fechasDesdeHasta')
              
          @endif
          
          <div class="card-body">
            <div class="row">
              @forelse ($mantenimientos as $mantenimiento)
                   <div class="col-sm-4">
                <div class="card hover" style/="">
                  <div class="card-header">
                    {{-- <p>dlfkjsldkfjsldkfjlsdkjflskdjflsdjf</p> --}}
                    <span><strong>Fecha:</strong> {{ date("d/m/Y " , strtotime($mantenimiento->fecha))}}</span> <br> 
                    <span><strong># de la unidad:</strong> {{$mantenimiento->bus_id}}</span> <br> 
                    {{-- <span>Kilometraje: 6118215 Km</span>    --}}
                    <span> <strong> Tipo de mantenimiento:</strong> {{$mantenimiento->tipo_mantenimiento}}</span>   
                    {{-- <span>Servicio: Cambio de aceite</span>    --}}
                  </div>      
                
                  <div class="card-footer text-right">
                  <strong class="text-right "><a href="#"  data-value= "{{ $mantenimiento->id }}" class="vermas text-right">Ver más</a></strong>
                  </div>
                </div>
              </div>
              @empty 
              <div class="col-sm-12">
                <div class="card hover text-center">
                  <h3 style="background-color:transparent;">No se han encontrado resultados</h3>
                  
                </div>   
              </div>
              @endforelse
              
            </div>
          </div>

          <div class="card-footer text-center"></div>    
          
          
              <div class="pagination2">
                {{ $mantenimientos->links() }}
              
              </div>
           
        </div>		
      </div>
    </div>
  </div>

  @include('mantenimiento.servicios_reparaciones.modal-ver-mas-mantenimiento')
  
  {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> --}}
  {{-- <script type="text/javascript" src="{{ asset('js/staffform.js') }}"></script> --}}
  
  {{-- <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script> --}}
  {{-- <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script> --}}
  {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
  {{-- <script type="text/javascript"  src="{{ asset('plugins/select2/select2.min.js') }}"></script> --}}
  

  {{-- <script type="text/javascript" src="{{ asset('js/mantenimiento/busesForm.js') }}"></script> --}}
  
  <script>
    let vermas = document.getElementsByClassName('vermas');
    for (x=0; x <vermas.length; x++){

      let mantenimiento= vermas[x];
      
      mantenimiento.addEventListener("click", function(event){
          setTimeout(function(){
            $('#exampleModalLong').modal('show');
          }, 350);
          $.get( "/mantenimiento/cronograma/servicio/"+mantenimiento.dataset.value, function( data ) {
            document.getElementById('exampleModalLongTitle').innerHTML = `Unidad # <strong> ${data.bus_id} </strong>`;
            document.getElementById('modal-mantenimiento').innerHTML = `
              <span><strong>Kilometraje:</strong> ${data.kilometraje} <strong>Km</strong></span> <br> 
              <span> <strong> Tipo de mantenimiento:</strong> ${data.tipo_mantenimiento}</span><br>   
              <span><strong>Servicio:</strong> ${data.tipo_servicio}</span>  <br>
            `
              document.getElementById('mecanicos').innerHTML = `
                <span><strong>Mecanico/a:</strong> ${data.staffs[0].names} ${data.staffs[0].last_names}</span>  <br>
              `
            for (let i = 1; i < data.staffs.length; i++) {
              
              document.getElementById('mecanicos').innerHTML += `
                  <span><strong>Mecanico/a:</strong> ${data.staffs[i].names} ${data.staffs[i].last_names}</span>  <br> 
                
              `
            }

            let editarButton = document.getElementById('editar');
            
            editarButton.addEventListener("click", function(event){
              location.href="/mantenimiento/servicio/"+ data.id;

            })



          });

        
      }) 
    }
    
  </script>
  
  </body>
  
    