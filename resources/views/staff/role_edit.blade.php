@extends('layouts.staff_base')


<body>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="" class="card card2">
                <div class="row">   
                   <div class="card-header col-sm-12  "><h3 class="azul text-center ">Cargos</h3></div>
                    <div class="card-body">
                        <form method="post"  >
                        {{ csrf_field() }}
                            <div class="row text-center">
                                
                                {{-- cargos --}}
                                <div  class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <label for="admin" class="form-label">Presidencia</label>
                                </div>
                                <div class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <input  id="admin"  @if($permiso->role->Admin) checked="checked" @else  @endif class="form-control custom-control custom-checkbox" type="checkbox" name="admin" value="1" >
                                </div>
                                
                                <div  class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <label for="mantenimiento" class="form-label">Jefe de Mantenimiento</label>
                                </div>
                                <div class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <input id="mantenimiento" @if($permiso->role->Mantenimiento) checked="checked" @else  @endif class="form-control custom-control custom-checkbox" type="checkbox" name="mantenimiento" value="1" >
                                </div>
                                
                                <div  class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <label for="personal" class="form-label">Jefe de Recursos Humanos</label>
                                </div>
                                <div class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <input id="personal" @if($permiso->role->Personal) checked="checked" @else @endif class="form-control custom-control custom-checkbox" type="checkbox" name="personal" value="1" >
                                </div>
                                <div  class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <label for="inventario" class="form-label">Jefe de Inventario</label>
                                </div>
                                <div class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <input id="inventario"  @if($permiso->role->Inventario) checked="checked" @else  @endif class="form-control custom-control custom-checkbox" type="checkbox" name="inventario" value="1" >
                                </div>
                                <div  class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <label for="operaciones" class="form-label">Jefe de Operaciones</label>
                                </div>
                                <div class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <input id="operaciones" @if($permiso->role->Operaciones) checked="checked" @else  @endif class="form-control custom-control custom-checkbox" type="checkbox" name="operaciones" value="1" >
                                </div>
                            </div>
                        </div>

                       
                            
                        </form>
                    </div>
                    
                </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/checkearcargo.js') }}"></script>
@endsection

</body>
