<head>
        <link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
        {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{asset("plugins/select2/select2.min.css")}}">

</head>
        
        <body>
        @include('layouts.mantenimiento_base')
            
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-7">
                    <div id="" class="card card2 ">
                        <div class="card-header">
                            <h3 id="hola" class="azul text-center m-3 ">Pdf de Buses</h3>
                        </div>
                        <div class="card-body text-white">
                             <div class="row text-center" >
                               
                                <div class="col-sm-4 mt-5 mb-5">
                                  <a href="/mantenimiento/pdf/buses/opcion?q=1">
                                    <div class="card  header" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i> Total de Buses</h4>
                                    </div>
                                  </a>
                                </div>
                              

                              
                                <div class="col-sm-4 mt-5 mb-5">
                                  <a href="/mantenimiento/pdf/buses/opcion?q=2">
                                    <div class="card bg-verde" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i> Cono Norte</h4>
                                     
                                    </div>
                                  </a>
                                </div>
                             
                                
                                <div class="col-sm-4 mt-5 mb-5">
                                  <a href="/mantenimiento/pdf/buses/opcion?q=3">
                                    <div class="card header" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i> Cono Sur</h4>
                                      
                                    </div>
                                  </a>
                                </div>
                             
                             
                              
                              
                             </div>
                        </div>
                       
                     
                        </div>
                        
                    </div>		
                </div>
            </div>
        </div>
        @if (session('status'))
              <script type="text/javascript">
                  $(document).ready(function() {
                      swal(
                      'Advertencia',
                      '{{ session('status') }}' ,
                      'warning'
                      )
                  })
              </script>
          @endif
        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/staffform.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/jquery-validation/jquery.formatter.min.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
        <script type="text/javascript"  src="{{ asset('plugins/select2/select2.min.js') }}"></script>
        

        <script type="text/javascript" src="{{ asset('js/mantenimiento/busesForm.js') }}"></script>
        <script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>
        
    
        </body>
        
        