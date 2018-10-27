<head>
        <link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>
        
        <body>
        @include('layouts.mantenimiento_base')
            
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-7">
                    <div id="" class="card card2 ">
                        <div class="card-header">
                            <h3 id="hola" class="azul text-center m-3 ">Registro de Peticion del Producto</h3>
                        </div>
                        <form action="/mantenimiento/peticion/{{ $producto->id }}/created" method="post">
                        <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    {{-- formulario --}}
                                    
        
                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class=" form-group" >
                                            <strong><label class="bmd-label-floating" for="nombre_producto">Nombre del Producto</label></strong>
                                            <input class="form-control {{ $errors->has('nombre_producto') ? ' is-invalid' : '' }}" type="" name="nombre_producto" value="{{ $producto->nombre_producto }}" readonly="">
                                                 
                                                 @if ($errors->has('nombre_producto'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('nombre_producto') }}</strong>
                                                    </span>
                                                @endif		
                                        </div>	
                                        
                                    </div>
                                    
        
                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class="form-group">
                                            <strong><label class="bmd-label-floating" for="compatibilidad">Compatibilidad</label></strong>
                                            <input class="form-control {{ $errors->has('compatibilidad') ? ' is-invalid' : '' }}" type="text" name="compatibilidad" value="{{ $producto->compatibilidad }}" readonly="">
                                            @if ($errors->has('compatibilidad'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('compatibilidad') }}</strong>
                                                </span>
                                            @endif
        
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <select class="js-example-basic-single form-control mt-1 focus" name="cantidad" required="">
                                                <option selected="" disabled="">Cantidad</option>
                                                @for ($i = 1; $i <= $producto->cantidad ; $i++)
        

                                                <optgroup label="">
                                                <option >{{ $i }}</option>
                                               
                                                @endfor
                                            </select>
                                            
                                            
                                        </div>
                                    </div>

                                    
                                    
                                    
                                    <div class="col-md-12  col-lg-6 mt-5" >
                                        <div class="" >
                                            <select class="js-example-basic-single2 form-control mt-1 focus" name="bus_id" required="" >
                                                <option selected="" disabled=""># de la Unidad</option>
                                                 @forelse($buses as $bus)
                                                <optgroup label="">
                                                <option >{{ $bus->id_bus }}</option>
                                                {{-- <option value="{{ $conductor->id }}">{{ $conductor->names." ".  $conductor->last_names}}</option> --}}
                                                    
                                                

                                                @empty
                                                <optgroup label="No hay conductores">
                                                @endforelse
    
                                            </select>
                                            
                                        </div>
                                    </div>

                                    
                                   
                                    <div class="col-lg-12 col-md-12  mt-4" id="observacion">
                                        <div class="form-group">
                                            <strong><label for="observacion" class="bmd-label-floating">Observación</label></strong>
                                            <textarea name="observacion" class="form-control focus {{ $errors->has('observacion') ? ' is-invalid' : '' }}" value="{{ old('observacion') }}"></textarea>
                                            @if ($errors->has('observacion'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('observacion') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div>

                                
                                
          
                                    
                                        
                                    </div>
                                    
                                </div>
                        <div class="card-footer mt-5">
                            <button class="btn btn-primary btn-raised mx-auto d-block header" type="submit"> Guardar</button>
                        </div>
                        </form>
                        </div>
                        
                    </div>		
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/staffform.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

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
        
        </body>
        
        