<head>
        <link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("plugins/select2/select2.min.css")}}">

</head>
        
        <body>
        @include('layouts.mantenimiento_base')
            
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-7">
                    <div id="" class="card card2 ">
                        <div class="card-header">
                            <h3 id="hola" class="azul text-center m-3 ">Registro de Buses</h3>
                        </div>
                        <form action="/mantenimiento/buses/registrar" method="post">
                        <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    {{-- formulario --}}
                                    
        
                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class=" form-group" >
                                            <strong><label class="bmd-label-floating" for="id_bus"># de la Unidad</label></strong>
                                            <input  class="form-control {{ $errors->has('id_bus') ? ' is-invalid' : '' }}" type="" name="id_bus" value="{{ old('id_bus') }}" >
                                                 
                                                 @if ($errors->has('id_bus'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('id_bus') }}</strong>
                                                    </span>
                                                @endif		
                                        </div>	
                                        
                                    </div>
                                    
        
                                    <div class="col-md-12 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <select required="" class="js-example-basic-single form-control mt-1 focus" name="modelo" required="">
                                            <option selected="" disabled="">Elige un Tipo de Unidad</option>
                                            
                                            <optgroup label="">
                                            <option>6118</option>
                                            <option>6896</option>
                                            <option>6752</option>

                                            

                                        </select>
                                        
                                        
                                    </div>
                                </div>


                                    <div class="col-md-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <select required="" class="js-example-basic-single form-control mt-1 focus" name="conductor" required="">
                                                <option selected="" disabled="">Elige un conductor</option>
                                                @forelse($conductores as $conductor)
                                                <optgroup label="">
                                                <option value="{{ $conductor->id }}">C.I {{ $conductor->id }}, <br>{{ $conductor->names }} {{ $conductor->last_names }}</option>
                                                {{-- <option value="{{ $conductor->id }}">{{ $conductor->names." ".  $conductor->last_names}}</option> --}}
                                                    
                                                

                                                @empty
                                                <optgroup label="No hay conductores">
                                                @endforelse
                                                <optgroup>
                                                    <option>No tiene conductor asignado</option>
                                                </optgroup>
                                            </select>
                                            
                                            
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-6 col-md-12 mt-5 " >
                                        <div class="row">
                                            <div class="col-md-6 pl-5 mt-3">
                                                <label>Esta Operativa?</label>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                            <div class="switch">
                                                <label>Si</label>
                                                <label id="active_bus" >
                                                    <input  type="checkbox" id="active_bus_check" name="estado" ><span class="lever switch-col-green" ></span> 
                                                    No
                                                </label>
                                            </div>
                                                
                                            </div>
                                                
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 d-none col-lg-6 mt-5" id="motivo_inactividad">
                                        <div class="" >
                                            <select required="" class="js-example-basic-single2 form-control mt-1 focus" name="motivo_inactividad" required="" >
                                                <option selected="" disabled="">Motivo de la inactividad</option>
                                                
                                                <optgroup label="">
                                                <option >a Desincorporar</option>
                                                <option >Servicio</option>
                                                <option >Falla</option>
                                                <option >Mantenimiento</option>
                                                {{-- <option value="{{ $conductor->id }}">{{ $conductor->names." ".  $conductor->last_names}}</option> --}}
                                                    
                                                </optgroup>
    
                                            </select>
                                            
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-6 col-md-12 d-none mt-3" id="fecha_inactivo">
                                        <div class="form-group">
                                            <strong><label for="fecha_inactivo"  class="bmd-label-floating">Inactivo Desde</label></strong>
                                            <input  class="form-control "  name="fecha_inactivo" id="date">
                                             
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 d-none mt-5" id="observacion">
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

                                
                                
                                    
                                   {{--  <div class="col-lg-6 col-md-12 mt-5">
                                        <div class="form-group">
                                            <strong><label class="bmd-label-floating">Apellidos</label></strong>
                                            <input  class="form-control {{ $errors->has('last_names') ? ' is-invalid' : '' }}" type="text" name="last_names" value="{{ old('last_names') }}">
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
                                            <select required="" required class="form-control focus  {{ $errors->has('genre') ? ' is-invalid' : '' }}"  name="genre" value="{{ old('genre') }}">
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
        <script type="text/javascript"  src="{{ asset('plugins/select2/select2.min.js') }}"></script>
        

        <script type="text/javascript" src="{{ asset('js/mantenimiento/busesForm.js') }}"></script>
        
        
        </body>
        
        