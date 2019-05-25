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
                            <h3 id="hola" class="azul text-center m-3 ">Nuevo Servicio </h3>
                        </div>
                        <form action="/mantenimiento/nuevo/servicio" method="post">
                        <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    {{-- formulario --}}
                                    <div class="col-lg-6 col-md-12  mt-4" id="fecha_inactivo">
                                        <div class="form-group">
                                            <strong><label for="fecha"  class="bmd-label-floating">Fecha</label></strong>
                                        <input required  class="form-control "  name="fecha" id="date" value="{{ old('fecha') }}">
                                             
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <div class=" form-group" >
                                             <select required="" class="unidad form-control mt-1 focus" name="bus_id" required="">
                                             <option value="{{ old('bus_id') }}">{{ old('bus_id') }}</option>
                                                

                                              @forelse($buses as $bus)
                                                <optgroup label="">
                                                <option >{{ $bus->id_bus }}</option>
                                                    
                                                

                                                @empty
                                                <optgroup label="No hay conductores">
                                                @endforelse

                                          </select>	
                                        </div>	
                                        
                                    </div>
                                    <div class="col-md-12 col-lg-6 mt-3">
                                      <div class="form-group">
                                          <select required="" class="tipo_mantenimiento form-control mt-1 focus" name="tipo_mantenimiento" required="">
                                                <option value=""></option>
                                                <option value="{{ old('tipo_mantenimiento') }}">{{ old('tipo_mantenimiento') }}</option>

                                              <optgroup label="">
                                                <option>Preventivo</option>
                                                <option>Correctivo</option>
                                            

                                              

                                          </select>
                                          
                                          
                                        </div>
                                      </div>
                                      <div class="col-sm-11 col-lg-5 mt-3">
                                          <div class="form-group">
                                              <select required="" class="tipo_servicio form-control mt-1 focus" name="tipo_servicio" id="tipo_servicio" required="">
                                                <option value=""></option>

                                                @forelse ($servicios as $servicio)
                                                    <option>{{$servicio->name}}</option>
                                                    
                                                @empty
                                                    <option value="">No hay servios registre alguno</option>
                                                    
                                                @endforelse  
                                                  
                                              </select>
                                              
                                              
                                          </div>
                                      </div>
                                      <div class="col-sm-1 mt-5">
                                        <h4><a href="#" class="azul hover" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-plus"></i></a></h4>
                                      </div>
                                   


                                    <div class="col-md-12  col-lg-12 mt-5" id="mecanicos">
                                        <div class="" >
                                            <select  multiple class="mecanicos form-control mt-1 focus"  name="mecanicos[]" required="" >
                                                <option class="p-5" value=""></option>
                                                <option value="{{ old('mecanicos[]') }}">{{ old('mecanicos[]') }}</option>

                                                @forelse($mecanicos as $mecanico)
                                                  <optgroup label="">
                                                  <option value="{{ $mecanico->id }}">C.I {{ $mecanico->id }}, <br>{{ $mecanico->names }} {{ $mecanico->last_names }}</option>
                                                  {{-- <option value="{{ $conductor->id }}">{{ $conductor->names." ".  $conductor->last_names}}</option> --}}
                                                      
                                                  

                                                  @empty
                                                  <optgroup label="No hay Mecanicos">
                                                  @endforelse
    
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
        
        @include('mantenimiento.servicios_reparaciones.modalNuevoServicio')

         @if (session('status'))
          <script type="text/javascript">
            $(document).ready(function() {
                swal(
                'Error',
                '{{ session('status') }}' ,
                'error'
                )
            })
          </script>
        @endif

        {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('js/staffform.js') }}"></script> --}}
        
        <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script> --}}
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> --}}
        <script type="text/javascript"  src="{{ asset('plugins/select2/select2.min.js') }}"></script>
  <script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>

        
        <script>
          
          $(document).ready(function() {

          $('.unidad').select2({
              placeholder: '# de la Unidad'
          }); 
          $('.tipo_mantenimiento').select2({
              placeholder: 'Tipo de Mantenimiento'
          }); 
          $('.tipo_servicio').select2({
              placeholder: 'Tipo de Servicio'
          }); 
          $('.mecanicos').select2({
            placeholder: 'Mecanicos',
            maximumSelectionLength: 3,
          //  allowClear: true
          }); 
            min = new Date();
            // min.setYear(min.getFullYear()-50);
            max = new Date();
            max.setYear(max.getFullYear()-15);
            // var sd = new Date(), ed = new Date();
          $('#date').bootstrapMaterialDatePicker({
            weekStart : 1,
            format : 'YYYY/M/D ', 
            lang: 'es',
            time: false,
            daysOfWeekDisabled: '0,6',
            minDate: min,
	        // maxDate: max
        });

  

        });
        </script>
        
        </body>
        
        