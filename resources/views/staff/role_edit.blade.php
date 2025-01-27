<body>
@include('layouts.staff_base')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div id="" class="card card2">
                <div class="row">   
                   <div class="card-header col-sm-12  "><h3 class="azul text-center ">Cargos</h3></div>
                    <div class="card-body">
                        <form method="post" action="{{ url('personal/role/update/'.$permiso->role->id ) }}" >
                        {{ csrf_field() }}
                            <div class="row text-center">
                                
                                {{-- cargos --}}
                                @if ($hasAdmin)
                                    @if ($hasAdmin->user->username == $permiso->username)
                                        <div  class="admin col-lg-6 mt-5 col-sm-6 ">
                                            <label for="admin" class="form-label">Presidencia</label>
                                        </div>
                                        <div class="admin col-lg-6 mt-5 col-sm-6 text-center">
                                            <input  id="admin"  @if($permiso->role->Admin) checked="checked" @else  @endif class="form-control custom-control custom-checkbox" type="checkbox" name="admin" value="1" >
                                        </div>
                                    @else 
                                        <div  class="admin col-lg-6 mt-5 col-sm-6 d-none">
                                            <label for="admin" class="form-label">Presidencia</label>
                                        </div>
                                        <div class="admin col-lg-6 mt-5 col-sm-6 text-center d-none">
                                            <input  id="admin"  @if($permiso->role->Admin) checked="checked" @else  @endif class="form-control custom-control custom-checkbox" type="checkbox" name="admin" value="1" >
                                        </div>
                                    @endif
                                @else
                                    
                                    <div  class="admin col-lg-6 mt-5 col-sm-6 ">
                                        <label for="admin" class="form-label">Presidencia</label>
                                    </div>
                                    <div class="admin col-lg-6 mt-5 col-sm-6 text-center">
                                        <input  id="admin"   class="form-control custom-control custom-checkbox" type="checkbox" name="admin" value="1" >
                                    </div>
                                    
                                @endif

                                
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
                                    <label for="inventario" class="form-label">Jefe de Almacen</label>
                                </div>
                                <div class="admin col-lg-6 mt-5 col-sm-6 ">
                                    <input id="inventario"  @if($permiso->role->Inventario) checked="checked" @else  @endif class="form-control custom-control custom-checkbox" type="checkbox" name="inventario" value="1" >
                                </div>
                                
                            </div>
                            <div class="card-footer mt-5">
                                <button class="btn btn-primary mt-3 mb-0 mx-auto d-block" type="submit"> Guardar</button>
                            </div>
                        </div>

                       
                        
                        </form>
                    </div>
                    
                </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/checkearcargo.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
