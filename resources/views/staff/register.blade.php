@extends('layouts.staff_base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card card2 text-center">
				<div class="card-header">
					<h3 class="azul text-center m-3 ">Registro de Personal</h3>
				</div>
				<form action="/personal/registrar/" method="post">
				<div class="card-body">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-lg-6 col-md-12" >
								<label for="nacionality" class="form-label">Nacionalidad</label>							
								<select name="nacionality" class="form-control focus">
									<option></option>
									<option>V</option>

									<option>E</option>
								</select>
							</div>

							<div class="col-lg-6 col-md-12">

								<label class="form-label" for="cedula">cedula</label>
								<input class="form-control" type="text" name="cedula" >	
								
							</div>

							<div class="col-lg-6 col-md-12 mt-5">
							<label class="form-label" for="name">Nombre</label>
							<input class="form-control" type="text" name="name" >
							</div>
							
							<div class="col-lg-6 col-md-12 mt-5">
							<label class="form-label">last-name</label>
							<input class="form-control" type="text" name="last_name">
							</div>

							<div class="col-lg-6 col-md-12 mt-5">
							<label for="genre" class="form-label">Género</label>
							<input class="form-control" type="text" name="genre">
							</div>
							
							<div class="col-lg-6 col-md-12 mt-5">
							<label for="email" class="form-label">Email</label>
							<input class="form-control" type="email" name="email">
							</div>


							<div class="col-lg-6 col-md-12 mt-5">
							<label for="phone" class="form-label">telefono</label>
							<input class="form-control" type="text" name="phone">
							</div>

							<div class="col-lg-6 col-md-12 mt-5">
							<label for="position" class="form-label">Posicion</label>
							<input class="form-control" type="text" name="position">
							</div>

							<div class="col-lg-12 col-md-12 mt-5">
							<label for="address" class="form-label">direccion</label>
							<textarea name="address" class="form-control focus"></textarea>
							</div>
							<div class="col-lg-6 mt-5">
								<label class="form-label" for="cargo">¿Desea agregarle Permiso a este Usuario?</label>
								

							</div>
							<div class="col-lg-6 mt-5">
								<input id="cargo"  class=" form-control custom-control custom-checkbox" type="checkbox" name="cargo" value="1"  	>
							</div>
							
							<br>
							<br><br>
							<br><br>
							
							<div class="card-header col-sm-12 admin ocultar-permisos"><h3 class="azul text-center ">Cargos</h3></div>
								
							<div  class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<label for="admin" class="form-label">Precidencia</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<input  id="admin" class="form-control custom-control custom-checkbox" type="checkbox" name="admin" value="1" >
							</div>
							
							<div  class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<label for="mantenimiento" class="form-label">Jefe de Mantenimiento</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<input id="mantenimiento" class="form-control custom-control custom-checkbox" type="checkbox" name="mantenimiento" value="1" >
							</div>
							
							<div  class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<label for="personal" class="form-label">Jefe de Recursos Humanos</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<input id="personal" class="form-control custom-control custom-checkbox" type="checkbox" name="personal" value="1" >
							</div>
							<div  class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<label for="inventario" class="form-label">Jefe de Inventario</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<input id="inventario" class="form-control custom-control custom-checkbox" type="checkbox" name="inventario" value="1" >
							</div>
							<div  class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<label for="operaciones" class="form-label">Jefe de Operaciones</label>
							</div>
							<div class="admin col-lg-6 mt-5 col-md-12 ocultar-permisos">
								<input id="operaciones" class="form-control custom-control custom-checkbox" type="checkbox" name="operaciones" value="1" >
							</div>
								
								
							
								
							</div>
							
						</div>
				<div class="card-footer mt-5">
					<button class="btn btn-primary mx-auto d-block" type="submit"> guardar</button>
				</div>
				</form>
				</div>
				
			</div>		
		</div>
	</div>
</div>
@endsection

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

