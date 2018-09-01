<head>
<link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
@include('layouts.staff_base')
	

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-7">
			<div id="" class="card card2 ">
				<div class="card-header">
					<h3 id="hola" class="azul text-center m-3 ">Registro de Personal</h3>
				</div>
				<form action="/personal/registrar/" method="post">
				<div class="card-body">
						{{ csrf_field() }}
						<div class="row">
							{{-- formulario --}}
							<div class="col-lg-6 col-md-12 mt-3 " >
								<div class="form-group">
									<label class="bmd-label-floating" for="nacionality">Nacionalidad</label>
									<select  required name="nacionality" class="form-control  focus  {{ $errors->has('nacionality') ? ' is-invalid' : '' }}">
											<option disabled selected></option>
											<option>V</option>
											
											<option>E</option>
									</select>
									 @if ($errors->has('nacionality'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('nacionality') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-lg-6 col-md-12 mt-4">
								<div class=" form-group" >
									<strong><label class="bmd-label-floating" for="id">Cedula</label></strong>
									<input class="form-control {{ $errors->has('id') ? ' is-invalid' : '' }}" type="" name="id" value="{{ old('id') }}">
										 
										 @if ($errors->has('id'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('id') }}</strong>
											</span>
										@endif		
								</div>	
								
							</div>
							

							<div class="col-lg-6 col-md-12 mt-5">
								<div class="form-group">
									<strong><label class="bmd-label-floating" for="names">Nombre</label></strong>
									<input class="form-control {{ $errors->has('names') ? ' is-invalid' : '' }}" type="text" name="names" value="{{ old('names') }}">
									@if ($errors->has('names'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('names') }}</strong>
										</span>
									@endif

								</div>
							</div>
							
							<div class="col-lg-6 col-md-12 mt-5">
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
									{{-- <input type="email" class="form-control" id="exampleInputEmail1"> --}}
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
							</div>
							
							{{-- parte para agregarle permisos --}}
							<div class="col-lg-6 mt-5">
								<strong><label class="form-label" for="cargo">¿Desea agregarle Permiso a este Usuario?</label></strong>
							</div>
							<div class="col-lg-6 mt-5">
								<input id="cargo"  class=" form-control custom-control custom-checkbox" type="checkbox" name="cargo" value="1"  	>
							</div>
							
							<br>
							<br><br>
							<br><br>
							
							{{-- cargos --}}
							

							<div class="card-header col-sm-12 admin ocultar-permisos"><h3 class="azul text-center ">Cargos</h3></div>
								
							<div  class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos text-center">
								<label for="admin" class="form-label">Presidencia</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos">
								<input  id="admin" class="form-control custom-control custom-checkbox" type="checkbox" name="admin" value="1" >
							</div>
							
							<div  class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos text-center">
								<label for="mantenimiento" class="form-label">Jefe de Mantenimiento</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos">
								<input id="mantenimiento" class="form-control custom-control custom-checkbox" type="checkbox" name="mantenimiento" value="1" >
							</div>
							
							<div  class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos text-center">
								<label for="personal" class="form-label">Jefe de Recursos Humanos</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos">
								<input id="personal" class="form-control custom-control custom-checkbox" type="checkbox" name="personal" value="1" >
							</div>
							<div  class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos text-center">
								<label for="inventario" class="form-label">Jefe de Inventario</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos">
								<input id="inventario" class="form-control custom-control custom-checkbox" type="checkbox" name="inventario" value="1" >
							</div>
							<div  class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos text-center">
								<label for="operaciones" class="form-label">Jefe de Operaciones</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-sm-6 ocultar-permisos">
								<input id="operaciones" class="form-control custom-control custom-checkbox" type="checkbox" name="operaciones" value="1" >
							</div>

								
								
							
								
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
<script type="text/javascript">
	// $('#date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
	
	$('#date').bootstrapMaterialDatePicker({
		weekStart : 0,
		format : 'YYYY/M/D ', 
		lang: 'es',
		time: false,
	
	
	});
</script>
</body>

