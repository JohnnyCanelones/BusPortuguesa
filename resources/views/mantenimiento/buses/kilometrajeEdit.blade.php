<head>
        <link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("plugins/select2/select2.min.css")}}">

</head>
        
        <body>
        @include('layouts.mantenimiento_base')
            
         @if (session('error'))
            <script type="text/javascript">
                $(document).ready(function() {
                    swal(
                    'Error!',
                    '{{ session('error') }}' ,
                    'error'
                    )
                })
            </script>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-7">
                    <div id="" class="card card2 ">
                        <div class="card-header">
                            <a class="text-left" href="/mantenimiento/show/buses" style="color: #008a34"><i class="fas fa-angle-left"></i> Atras</a>
                            <h3 id="hola" class="azul text-center m-3 ">Modificar Kilometraje a la Unidad # {{ $bus->id_bus }}</h3>
                        </div>
                      <form action="/mantenimiento/kilometraje/{{$bus->id_bus}}" method="post">
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
                                    
        
                                    <div class="col-md-12 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <select disabled class="js-example-basic-single form-control mt-1 focus" name="modelo" >
                                            <option selected="" >{{$bus->modelo}}</option>
                                            
                                            <optgroup label="">
                                            <option>6118</option>
                                            <option>6896</option>
                                            <option>6752</option>

                                            

                                        </select>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mt-4">
                                        <div class=" form-group" >
                                            <strong><label class="bmd-label-floating" for="kilometraje">Kilometraje</label></strong>
                                            <input  class="form-control {{ $errors->has('kilometraje') ? ' is-invalid' : '' }}" type="" name="kilometraje" value="{{ $kilometraje }}" >
                                                 
                                                 @if ($errors->has('kilometraje'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('kilometraje') }}</strong>
                                                    </span>
                                                @endif		
                                        </div>	
                                        
                                    </div>


                                    <div class="col-md-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <select disabled class="js-example-basic-single form-control mt-1 focus" name="conductor" >
                                                @if ($bus->conductor_id == null)
                                                <optgroup>
                                                  <option selected value='0'>No tiene conductor asignado</option>
                                                </optgroup>
                                                @else 
                                                  <optgroup label="Seleccionado">
                                                  <option value="{{ $bus->staff->id }}">C.I {{ $bus->staff->id }}, <br>{{ $bus->staff->names }} {{ $bus->staff->last_names }}</option>

                                                </optgroup>
                                                @endif
                                                
                                            </select>
                                            
                                            
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
        
        <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
        <script type="text/javascript"  src="{{ asset('plugins/select2/select2.min.js') }}"></script>
        <script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>
        

        <script type="text/javascript" src="{{ asset('js/mantenimiento/busesForm.js') }}"></script>
        
       
</body>
        
        