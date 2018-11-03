<head>
        <link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>
        
        <body>
        @include('layouts.inventario_base')
            
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-7">
                    <div id="" class="card card2 ">
                        <div class="card-header">
                            <h3 id="hola" class="azul text-center m-3 ">Rechazar de Peticion del Producto</h3>
                        </div>
                        <form id="rechazoForm" action="/almacen/peticion/rechazada/{{ $peticion->id }}" method="post">
                        <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    {{-- formulario --}}
                                    
        
                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class=" form-group" >
                                            <strong><label class="bmd-label-floating" for="nombre_producto">Nombre del Producto</label></strong>
                                            <input class="form-control {{ $errors->has('nombre_producto') ? ' is-invalid' : '' }}" type="" name="nombre_producto" value="{{ $peticion->almacen->nombre_producto }}" readonly="">
                                                 
                                                 @if ($errors->has('nombre_producto'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('nombre_producto') }}</strong>
                                                    </span>
                                                @endif		
                                        </div>	
                                        
                                    </div>
                                    
        

                                    <div class="col-md-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <strong><label class="bmd-label-floating" for="cantidad">Cantidad</label></strong>
                                            <input class="form-control {{ $errors->has('cantidad') ? ' is-invalid' : '' }}" type="" name="cantidad" value="{{ $peticion->cantidad }}" readonly="">
                                                 
                                                 @if ($errors->has('cantidad'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                                    </span>
                                                @endif  
                                            
                                            
                                        </div>
                                    </div>

                                    
                                    
                                    
                                    <div class="col-md-12  col-lg-6 mt-5" >
                                        <div class="" >
                                            <strong><label class="bmd-label-floating" for="bus"># de la Unidad</label></strong>
                                            <input class="form-control {{ $errors->has('bus') ? ' is-invalid' : '' }}" type="" name="bus" value="{{ $peticion->bus_id }}" readonly="">
                                                 
                                                 @if ($errors->has('bus'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('bus') }}</strong>
                                                    </span>
                                                @endif  
                                            
                                            
                                        </div>
                                    </div>

                                    
                                   
                                    <div class="col-lg-6 col-md-12  mt-4" id="observacion">
                                        <div class="form-group">
                                            <strong><label for="observacion" class="bmd-label-floating">Observación</label></strong>
                                            <textarea  required="" name="observacion" class="form-control focus {{ $errors->has('observacion') ? ' is-invalid' : '' }}" value="{{ old('observacion') }}"></textarea>
                                            @if ($errors->has('observacion'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('observacion') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div>

                                
                                
          
                                    
                                        
                                    </div>
                                    
                                </div>
                        <div class="card-footer mt-5 text-center">
                            <button id="rechazar" class="btn btn-primary btn-raised mx-auto  header" type="submit"> Rechazar</button>
                            <a href="/almacen/peticiones" class="btn btn-primary btn-raised mx-auto  denied" "> Cancelar</a>
                        </div>
                        </form>
                        </div>
                        
                    </div>		
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script type="text/javascript"  src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.min.js"></script>


        <script type="text/javascript">
            $('.js-example-basic-single').select2(); 
            $('.js-example-basic-single2').select2(); 
            
            $('#date').bootstrapMaterialDatePicker({
                weekStart : 0,
                format : 'YYYY/M/D ', 
                lang: 'es',
                time: false,
            });


        </script>
        <script type="text/javascript">
            let botonRechazar = document.getElementById('rechazar');
            let rechazoForm = document.getElementById('rechazoForm');

                
            botonRechazar.addEventListener("click", function(event){
                event.preventDefault();
               swal({
                  title: '¿Estas Seguro Que quieres rechazarla?',
                  text: "No se puede Deshacer esta accion",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#4caf50',
                  cancelButtonColor: '#f44336',
                  confirmButtonText: 'Si, Rechazarla!',
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                  if (result.value) {
                    rechazoForm.submit()
                  }
                })
            });

                

        </script>
                  
        
        </body>
        
        