<head>
        <link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
        {{-- {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}} --}}
        <link rel="stylesheet" href="{{asset("plugins/select2/select2.min.css")}}">

</head>
        
        <body>
        @include('layouts.inventario_base')

            
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-7">
                    <div id="" class="card card2 ">
                        <div class="card-header">
                            <h3 id="hola" class="azul text-center m-3 ">Registro de Productos del Almacen</h3>
                        </div>
                        <form action="/almacen/inventario/{{ $producto->id }}" method="post">

                        <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-12 text-muted">
                                        
                                    (*) la cantidad para aceites y liquidos seran expresados en litros
                                    </div>
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
                                    
        

                                    <div class="col-md-12 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <select class="js-example-basic-single form-control mt-1 focus" name="compatibilidad" required="" disabled="">
                                            <option disabled="">Elige un Tipo de Unidad</option>
                                            
                                            <optgroup label="">
                                            <option @if($producto->compatibilidad == 6118)  selected="" @endif disabled="">6118</option>
                                            <option @if($producto->compatibilidad == 6896)  selected="" @endif disabled="">6896</option>
                                            <option @if($producto->compatibilidad == 6752)  selected="" @endif disabled="">6752</option>
                                            <option @if($producto->compatibilidad == 'Todas las Unidades') selected="" @endif disabled="">Todas las Unidades</option>

                                            

                                        </select>
                                        
                                        
                                    </div>
                                </div>

                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class="form-group">
                                           <select class="js-example-basic-single form-control mt-1 focus" name="cantidad" required="">
                                            <option  disabled="">Cantidad del Producto</option>
                                            <option  selected="" disabled="">{{ $producto->cantidad }}</option>
                                            
                                            <optgroup label="Añadir">
                                            @for ($i = 1; $i <= 20; $i++) 
                                                <option>{{ $i }}</option>
                                                
                                            @endfor
                                                
                                            

                                        </select>
        
                                        </div>
                                    </div>
                                    
                                   <div class="col-lg-6 col-md-12 mt-4">
                                        <div class="form-group">
                                            <strong><label class="bmd-label-floating" for="ubicacion">Ubicación</label></strong>
                                            <input readonly="" class="form-control {{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" type="text" name="ubicacion" value="{{ $producto->ubicacion }}">
                                            @if ($errors->has('ubicacion'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ubicacion') }}</strong>
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
        {{-- <script type="text/javascript" src="{{ asset('js/staffform.js') }}"></script> --}}
        {{-- 
        <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
        <script type="text/javascript"  src="{{ asset('plugins/select2/select2.min.js') }}"></script>
        

      {{--   <script type="text/javascript">

            // $('#date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
            
            $('#date').bootstrapMaterialDatePicker({
                weekStart : 0,
                format : 'YYYY/M/D ', 
                lang: 'es',
                time: false,
            
            
            });
        </script> --}}
        <script type="text/javascript">
            $(document).ready(function() {

                $('.js-example-basic-single').select2(); 
                
            });
        </script>
        </body>
        
        