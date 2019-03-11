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
    a.page-link {
      border-radius: 0 !important;
      /* border: 1px solid red; */
      color: #0a3d86 !important;
      /* margin: 0 !important; */
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
                <a  href="#1">Todo el Cronograma </a>
                
              </div>
              <div class="col-sm-3">
                <a  href="#1">Cronograma fecha especifica</a>
              </div>
              <div class="col-sm-3">
                <a  href="#1">Cronograma por # de la unidad</a>
              </div>
              <div class="col-sm-3">
                <a  href="#1">Cronograma preventivos</a>
              </div>
              <div class="col-sm-3">
                <a  href="#1">Cronograma correctivos</a>
              </div>
            </div>
          </div>
          
          <div class="card-body">
            <div class="row">
              @for ($i = 0 ; $i < 9; $i++)
              <div class="col-sm-4">
                <div class="card hover" style="">
                  <div class="card-header">
                    {{-- <p>dlfkjsldkfjsldkfjlsdkjflskdjflsdjf</p> --}}
                    <span><strong>Fecha:</strong> 2019/02/23</span> <br> 
                    <span><strong># de la unidad:</strong> 6118</span> <br> 
                    {{-- <span>Kilometraje: 6118215 Km</span>    --}}
                    <span> <strong> Tipo de mantenimiento:</strong> preventivo</span>   
                    {{-- <span>Servicio: Cambio de aceite</span>    --}}
                  </div>      
                
                  <div class="card-footer text-right">
                    <strong class="text-right vermas"><a href="#" data-toggle="modal" data-target="#exampleModalLong" class="vermas text-right">Ver más</a></strong>
                  </div>
                </div>
              </div>
              
              @endfor
            </div>
          </div>

          <div class="card-footer text-center"></div>    
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link p-2  " href="#" tabindex="-1">Anterior</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link p-2 " href="#">Siguiente</a>
                </li>
              </ul>
            </nav>
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
  
  
  </body>
  
    