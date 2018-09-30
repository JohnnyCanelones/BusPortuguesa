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
                            <h3 id="hola" class="azul text-center m-3 ">Registro de Productos del Almacen</h3>
                        </div>
                        <form action="/mantenimiento/buses/registrar" method="post">
                        <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    {{-- formulario --}}
                                    
        
                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class=" form-group" >
                                            <strong><label class="bmd-label-floating" for="nombre_producto">Nombre del Producto</label></strong>
                                            <input class="form-control {{ $errors->has('nombre_producto') ? ' is-invalid' : '' }}" type="" name="nombre_producto" value="{{ old('nombre_producto') }}">
                                                 
                                                 @if ($errors->has('nombre_producto'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('nombre_producto') }}</strong>
                                                    </span>
                                                @endif    
                                        </div>  
                                        
                                    </div>
                                    
        

                                    <div class="col-md-12 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <select class="js-example-basic-single form-control mt-1 focus" name="compatibilidad" required="">
                                            <option selected="" disabled="">Elige un Tipo de Unidad</option>
                                            {{-- @forelse($conductores as $conductor) --}}
                                            <optgroup label="">
                                            {{-- <option >{{ $conductor->id }}</option> --}}
                                            {{-- <option value="{{ $conductor->id }}">{{ $conductor->names." ".  $conductor->last_names}}</option> --}}
                                                
                                            </div>

                                            {{-- @empty
                                            <option>No Hay Conductores registrados</option>
                                            @endforelse --}}
                                        </select>
                                        
                                        
                                    </div>
                                </div>

                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class="form-group">
                                            <strong><label class="bmd-label-floating" for="cantidad">Cantidad</label></strong>
                                            <input class="form-control {{ $errors->has('cantidad') ? ' is-invalid' : '' }}" type="text" name="cantidad" value="{{ old('cantidad') }}">
                                            @if ($errors->has('cantidad'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                                </span>
                                            @endif
        
                                        </div>
                                    </div>
                                    
                                   <div class="col-lg-6 col-md-12 mt-4">
                                        <div class="form-group">
                                            <strong><label class="bmd-label-floating" for="ubicacion">Ubicación</label></strong>
                                            <input class="form-control {{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" type="text" name="ubicacion" value="{{ old('ubicacion') }}">
                                            @if ($errors->has('ubicacion'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ubicacion') }}</strong>
                                                </span>
                                            @endif
        
                                        </div>
                                    </div>

                                {{-- 
                                    <div class="col-lg-6 col-md-12 mt-5 " >
                                        <div class="row">
                                            <div class="col-md-6 pl-5 mt-3">
                                                <label>Esta Activa?</label>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                            <div class="switch">
                                                <label>Si</label>
                                                <label>
                                                    <input type="checkbox" id="active_bus"><span class="lever switch-col-green" ></span> 
                                                    No
                                                </label>
                                            </div>
                                                
                                            </div>
                                                
                                        </div>
                                    </div> --}}
                                
                                    
                                   {{--  <div class="col-lg-6 col-md-12 mt-5">
                                        <div class="form-group">
                                            <strong><label class="bmd-label-floating">Apellidos</label></strong>
                                            <input class="form-control {{ $errors->has('last_names') ? ' is-invalid' : '' }}" type="text" name="last_names" value="{{ old('last_names') }}">
                                            @if ($errors->has('last_names'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_names') }}</strong>
                                                </span>
                                            @endif
                                        </div>      
                                    </div>
        
                                    <div class="col-lg-6 col-md-12 mt-5">
                                            <div class="form-group">
                                                <strong><label for="date_birth" class="bmd-label-floating">Fecha de Nacimiento</label></strong>
                                                <input class="form-control "  name="date_birth" id="date">
                                                 
                                            </div>
                                        </div>
        
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <div class="form-group">
                                            <strong><label for="genre" class="bmd-label-floating">Género</label></strong>
                                            <select required class="form-control focus  {{ $errors->has('genre') ? ' is-invalid' : '' }}"  name="genre" value="{{ old('genre') }}">
                                                <option></option>
                                                <option>Femenino</option>
                                                <option>Masculino</option>
                                            </select>
                                            @if ($errors->has('genre'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('genre') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-12 mt-5 ">
                                        <div class="form-group">
                                            <strong><label for="email" class="bmd-label-floating">Email</label></strong>
                                            <input class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div>
        
        
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <div class="form-group">
                                            <strong><label for="phone_number" class="bmd-label-floating ">telefono</label></strong>
                                            <input class="form-control  {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" type="text" name="phone_number" value="{{ old('phone_number') }}">
                                            @if ($errors->has('phone_number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <div class="form-group">
                                            <strong><label for="position" class="bmd-label-floating">Posicion</label></strong>
                                            <input class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" type="text" name="position" value="{{ old('position') }}">
                                            @if ($errors->has('position'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('position') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <div class="form-group">
                                            <strong><label for="address" class="bmd-label-floating">direccion</label></strong>
                                            <textarea name="address" class="form-control focus {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}"></textarea>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div> --}}
                                    
                                  
                                        
                                    
                                        
                                    </div>
                                    
                                </div>
                        <div class="card-footer mt-5">
                            <button class="btn btn-primary btn-raised mx-auto d-block header" type="submit"> guardar</button>
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

            // $('#date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
            
            $('#date').bootstrapMaterialDatePicker({
                weekStart : 0,
                format : 'YYYY/M/D ', 
                lang: 'es',
                time: false,
            
            
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('.js-example-basic-single').select2(); 
                
            });
        </script>
        </body>
        
        