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
                            <h3 id="hola" class="azul text-center m-3 ">Seleccione las fechas deseadas</h3>
                        </div>
                        <form action="/mantenimiento/cronograma/fechas" method="post">
                            {{-- @method('get') --}}
                        <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    {{-- formulario --}}
                                    <div class="col-lg-6 col-md-12  mt-4" id="fecha_inactivo">
                                        <div class="form-group">
                                            <strong><label for="fecha"  class="bmd-label-floating">Desde</label></strong>
                                            <input required  class="form-control "  name="desde" id="date">
                                             
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12  mt-4" id="fecha_inactivo">
                                        <div class="form-group">
                                            <strong><label for="fecha"  class="bmd-label-floating">Hasta</label></strong>
                                            <input required  class="form-control "  name="hasta" id="date2">
                                             
                                        </div>
                                    </div>

                                    
                                </div>
                        <div class="card-footer mt-5">
                            <button class="btn btn-primary btn-raised mx-auto d-block header" type="submit" id="buttonSubmit"> Buscar</button>
                        </div>
                        </form>
                        </div>
                        
                    </div>		
                </div>
            </div>
        </div>
        

        
        {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('js/staffform.js') }}"></script> --}}
        
        <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
        <script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>
        
        <script>
          $('#date').bootstrapMaterialDatePicker({
          weekStart : 0,
          format : 'YYYY-M-D ', 
          lang: 'es',
          time: false,
          });
          $('#date2').bootstrapMaterialDatePicker({
              weekStart : 0,
              format : 'YYYY-M-D ', 
              lang: 'es',
              time: false,
          });


          let submit = document.getElementById('buttonSubmit')
          submit.addEventListener('click', function (ev) {
            let desde = new Date(document.getElementById('date').value)
            let hasta = new Date(document.getElementById('date2').value)
            
            if (hasta < desde) {
              ev.preventDefault()
              swal(
              'Advertencia!',
              'La segunda fecha no puede ser menor a la primera' ,
              'warning'
              )
            }


          })


          
        </script>
        
        </body>
        
        