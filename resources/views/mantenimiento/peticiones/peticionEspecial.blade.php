<head>
        <link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
        {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{asset("plugins/select2/select2.min.css")}}">

</head>
        
        <body>
        @include('layouts.mantenimiento_base')
        @if (session('peticionEspecial'))
            <script type="text/javascript">
                $(document).ready(function() {
                    swal(
                    'Advertencia',
                    '{{ session('peticionEspecial') }}' ,
                    'warning'
                    )
                })
            </script>
        @endif
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-7">
                    <div id="" class="card card2 ">
                        <div class="card-header">
                            <h3 id="hola" class="azul text-center m-3 ">Registro de Peticion especial del Producto</h3>
                        </div>
                        <form action="/mantenimiento/peticion/especial/{{ $producto->id }}" method="post">
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
                                                <option disabled="">Cantidad</option>
                                                <optgroup label="">
                                                
                                                <option selected="" >{{ $cantidad }}</option>
                                                {{-- @for ($i = 1; $i <= $cantidad ; $i++) --}}
        
{{-- 
                                                <optgroup label="">
                                                <option >{{ $i }}</option>
                                               
                                                @endfor --}}
                                            </select>
                                            
                                            
                                        </div>
                                    </div>

                                    
                                    
                                    
                                    <div class="col-md-12  col-lg-6 mt-5" >
                                        <div class="" >
                                            <select class="js-example-basic-single2 form-control mt-1 focus" name="bus_id" required="" readonly>
                                                <option selected="" disabled=""># de la Unidad</option>
                                                 {{-- @forelse($buses as $bus) --}}
                                                <optgroup label="">
                                                <option selected >{{ $bus_id }}</option>
                                                {{-- <option value="{{ $conductor->id }}">{{ $conductor->names." ".  $conductor->last_names}}</option> --}}
                                                    
                                                

                                                {{-- @empty
                                                <optgroup label="No hay conductores">
                                                @endforelse --}}
    
                                            </select>
                                            
                                        </div>
                                    </div>

                                    
                                   
                                    <div class="col-lg-12 col-md-12  mt-4" id="observacion">
                                        <div class="form-group">
                                            <strong><label for="observacion" class="bmd-label-floating">Motivo</label></strong>
                                            <textarea required name="observacion" class="form-control focus {{ $errors->has('observacion') ? ' is-invalid' : '' }}" value="{{ old('observacion') }}"></textarea>
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
        
        <script type="text/javascript"  src="{{ asset('plugins/select2/select2.min.js') }}"></script>

        <script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>

        <script type="text/javascript">
            $('.js-example-basic-single').select2(); 
            $('.js-example-basic-single2').select2(); 
            
    

        </script>        
        
        </body>
        
        