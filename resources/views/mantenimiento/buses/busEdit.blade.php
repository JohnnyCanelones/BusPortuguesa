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
                            <a class="text-left" href="/mantenimiento/show/buses" style="color: #008a34"><i class="fas fa-angle-left"></i> Atras</a>

                            <h3 id="hola" class="azul text-center m-3 ">Editar la Unidad # {{ $bus->id_bus }}</h3>
                        </div>
                      <form action="/mantenimiento/bus/{{$bus->id_bus}}" method="post">
                        <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    {{-- formulario --}}
                                    
        
                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class=" form-group" >
                                            <strong><label class="bmd-label-floating" for="id_bus"># de la Unidad</label></strong>
                                            <input  disabled class="form-control {{ $errors->has('id_bus') ? ' is-invalid' : '' }}" type="" name="id_bus" value="{{ $bus->id_bus }}" >
                                                 
                                                 @if ($errors->has('id_bus'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('id_bus') }}</strong>
                                                    </span>
                                                @endif		
                                        </div>	
                                        
                                    </div>
                                    
        
                                   

                                 <div class="col-sm-11 col-lg-5 mt-4">
                                    <div class="form-group">
                                        <select required="" class="js-example-basic-single form-control mt-1 focus" id="modelo" name="modelo" required="">
                                            <option selected="" >{{$bus->modelo}}</option>
                                            
                                            @foreach ($modelos as $modelo)
                                            
                                            <option>{{ $modelo->name }}</option>
                                            @endforeach
                                            <option>Todas las Unidades</option>

                                            

                                        </select>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-sm-1 mt-5">
                                    
                                    <h4><a href="#" class="azul hover" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-plus"></i></a></h4>
                                </div>

                                <div class="col-lg-6 col-md-12 mt-4">
                                        <div class=" form-group" >
                                            <strong><label class="bmd-label-floating" for="kilometraje">Kilometraje</label></strong>
                                            <input  disabled class="form-control {{ $errors->has('kilometraje') ? ' is-invalid' : '' }}" type="" name="kilometraje" value="{{ $bus->kilometraje }}" >
                                                 
                                                 @if ($errors->has('kilometraje'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('kilometraje') }}</strong>
                                                    </span>
                                                @endif		
                                        </div>	
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-4">
                                            <div class=" form-group" >
                                                <strong><label class="bmd-label-floating" for="vin">Vin</label></strong>
                                                <input id="vin" required class="form-control {{ $errors->has('vin') ? ' is-invalid' : '' }}" type=""  name="vin" value="{{ $bus->vin }}" >
                                                        
                                                        @if ($errors->has('vin'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('vin') }}</strong>
                                                        </span>
                                                    @endif		
                                            </div>	
                                            
                                    </div>
                                     <div class="col-md-12 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <select required="" class="js-example-basic-single form-control mt-1 focus" name="esOperaciones" required="">
                                            <option selected="" >{{$bus->esOperaciones}}</option>
                                            
                                            <optgroup label="">
                                            <option>Cono Norte</option>
                                            <option>Cono Sur</option>

                                            

                                        </select>
                                        
                                        
                                    </div>
                                </div>


                                    <div class="col-md-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <select id="conductor" required="" class="js-example-basic-single form-control mt-1 focus" name="conductor" required="">
                                                @if ($bus->conductor_id == null)
                                                <optgroup>
                                                  <option selected value='0'>No tiene conductor asignado</option>
                                                </optgroup>
                                                @else 
                                                  <optgroup label="Seleccionado">
                                                  <option value="{{ $bus->staff->id }}">C.I {{ $bus->staff->id }}, <br>{{ $bus->staff->names }} {{ $bus->staff->last_names }}</option>

                                                </optgroup>
                                                @endif
                                                <optgroup label="Disponibles">
                                                @forelse($conductores as $conductor)
                                                <option value="{{ $conductor->id }}">C.I {{ $conductor->id }}, <br>{{ $conductor->names }} {{ $conductor->last_names }}</option>
                                                {{-- <option value="{{ $conductor->id }}">{{ $conductor->names." ".  $conductor->last_names}}</option> --}}
                                                    
                                                

                                                @empty
                                                <optgroup label="No hay conductores">
                                                @endforelse
                                                
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
                                                    <input  type="checkbox" id="active_bus_check" name="estado" @if ($bus->estado == "Inactivo")
                                                        checked                                                        
                                                    @endif><span class="lever switch-col-green" ></span> 
                                                    No
                                                </label>
                                            </div>
                                                
                                            </div>
                                                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-5 " >
                                        <div class="row">
                                            <div class="col-md-6 pl-5 mt-3">
                                                <label>Esta prestando servicio?</label>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                            <div class="switch">
                                                <label>No</label>
                                                <label id="active_servicio" >
                                                    <input  type="checkbox" id="active_servicio_check" name="estado2" @if ($bus->estado == 'Activo' and $bus->fecha_inactivo)
                                                        checked
                                                    @endif>
                                                    <span class="lever switch-col-green" ></span> 
                                                    Si
                                                </label>
                                            </div>
                                                
                                            </div>
                                                
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 d-none col-lg-6 mt-5" id="motivo_inactividad">
                                        <div class="mt-4" >
                                            <select required="" class="js-example-basic-single2 form-control mt-1 focus" name="motivo_inactividad" required="" >
                                              @if ($bus->estado == "Inactivo")
                                              <option selected="" >{{$bus->motivo_inactividad}}</option>
                                                  
                                              @else
                                              <option selected="" disabled="">Motivo de la inactividad</option>
                                                  
                                              @endif  
                                                
                                                <optgroup label="Disponibles">
                                                <option >a Desincorporar</option>
                                                <option >Servicio</option>
                                                <option >Falla</option>
                                                <option >Mantenimiento</option>
                                                {{-- <option value="{{ $conductor->id }}">{{ $conductor->names." ".  $conductor->last_names}}</option> --}}
                                                    
                                                </optgroup>
    
                                            </select>
                                            
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-6 col-md-12 d-none mt-5" id="fecha_inactivo">
                                        <div class="form-group">
                                            <strong><label for="fecha_inactivo"  class="bmd-label-floating">Inactivo Desde</label></strong>
                                            <input  class="form-control "  name="fecha_inactivo" id="date" value= @if ($bus->estado == "Inactivo")
                                                {{date('Y-m-d', strtotime($bus->fecha_inactivo))}}
                                            @endif>
                                             
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 d-none mt-4" id="observacion">
                                        <div class="form-group">
                                            <strong><label for="observacion" class="bmd-label-floating">Observación</label></strong>
                                            <textarea name="observacion" class="form-control focus {{ $errors->has('observacion') ? ' is-invalid' : '' }}" value="{{ old('observacion') }}">{{$bus->observacion}}</textarea>
                                            @if ($errors->has('observacion'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('observacion') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div>
                                    {{--  --}}
                                    
                                     <div class="col-lg-6 col-md-12 d-none mt-5" id="fecha_inactivo2">
                                        <div class="form-group">
                                            <strong><label for="fecha_inactivo2"  class="bmd-label-floating">Inactivo Desde</label></strong>
                                            <input  class="form-control "  name="fecha_inactivo2" id="date2" value="{{$bus->fecha_inactivo}}">
                                             
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 d-none mt-4" id="observacion2">
                                        <div class="form-group">
                                            <strong><label for="observacion2" class="bmd-label-floating">Observación</label></strong>
                                            <textarea name="observacion2" class="form-control focus {{ $errors->has('observacion2') ? ' is-invalid' : '' }}" id="textObservacion" value="{{ old('observacion2') }}">{{$bus->observacion}}</textarea>
                                            @if ($errors->has('observacion2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('observacion2') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                    </div>
                                
                                
                                        
                                    </div>
                                    
                                </div>
                        <div class="card-footer mt-5">
                            <button class="btn btn-primary btn-raised mx-auto d-block header" id="registrar" type="submit"> Guardar</button>
                        </div>
                        </form>
                        </div>
                        
                    </div>		
                </div>
            </div>
        </div>
                                @include('mantenimiento.buses.modalNuevoModelo')        
        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/staffform.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
        <script type="text/javascript"  src="{{ asset('plugins/select2/select2.min.js') }}"></script>
        <script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>
        

        <script type="text/javascript" src="{{ asset('js/mantenimiento/busesForm.js') }}"></script>
         <script>
            // $(document).ready(function() {
            $( "#conductor" ).change(function() {
                // alert( "Handler for .change() called." );
                $.get( "/api/mantenimiento/buses", function( data ) {
                    // console.log(data)
                    let $conductor = document.getElementById('conductor').value
                    let $button = document.getElementById('registrar')
                    for (let i = 0; i < data.length; i++) {
                        let conductor = data[i].conductor_id;
                            // console.log(conductor)
                        if ($conductor == 0) {
                            console.log("0")
                            $button.disabled = false;
                            
                        }if ($conductor == conductor) {
                            swal(
                            'Advertencia!',
                            'El conductor que seleccionaste ya esta encargado de otra unidad' ,
                            'warning'
                            )
                            // console.log($button);
                            $button.disabled = true;
                            break
                        }else {
                            $button.disabled = false;

                        }
                        
                    }
                })
                            
                
            });


          
            // })
        </script>
        
        </body>
        
        