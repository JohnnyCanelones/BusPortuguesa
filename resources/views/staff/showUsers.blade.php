<body> 
@include('layouts.staff_base')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div id="" class='card card2'>
                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Usuarios</h3>
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col-md-4 col-sm-4"></div>
                        <div class="col-sm-4  mb-2 text-center" >
                            <a href="/personal/users/pdf" class="btn btn-raised mx-auto  bg-verde  btn-primary  text-white p-2 rounded " style="font-size: 21px" target="_blank" data-toggle="tooltip" title="Generar PDF"> <span><i class="fas fa-file-pdf"></i></span></a></div>
                            {{-- (*) la cantidad para aceites y liquidos seran expresados en litros --}}
                        <div class="col-sm-4"></div>
                        
                    </div>
                    <table id="example" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                            <tr class="text-white" style="background-color: #003286e8">
                                <th class="text-white" scope="col">Cedula</th>
                                <th class="text-white" scope="col">Nombre</th>
                                <th class="text-white" scope="col">Apellido</th>
                                <th class="text-white" scope="col">#</th>
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <th scope="row">
                                    <a href="{{ url('personal/'.$user->staff->id) }}"  style="color: #008a34">{{ $user->staff->nationality}}-{{$user->staff->id}}</a>
                                </th>
                                <td> {{ $user->staff->names}}</td>
                                <td> {{ $user->staff->last_names}}</td>
                                <td>
                                    @if($user->role->Admin)
                                    <a href="{{  url('personal/role/'.$user->staff->id) }} " class="btn btn-primary"  style="color: #008a34">Presidente</a>
                                    @elseif($user->role->Inventario)
                                    <a href="{{  url('personal/role/'.$user->staff->id) }} " class="btn btn-primary"  style="color: #008a34">Encargado de Almacen</a>
                                    @elseif($user->role->Mantenimiento)
                                    <a href="{{ url('personal/role/'.$user->staff->id)  }}" class="btn btn-primary"  style="color: #008a34">Encargado de Mantenimiento</a>
                                    @elseif($user->role->Personal)
                                    <a href="{{ url('personal/role/'.$user->staff->id)  }}" class="btn btn-primary"  style="color: #008a34">Encargado de Personal</a>
                                    @endif
                                </td>        
                            </tr>
                            @empty
                            dfksdflkjs
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@if (session('status'))
    <script type="text/javascript">
        $(document).ready(function() {
            swal(
            'Listo!',
            '{{ session('status') }}' ,
            'success'
            )
        })
    </script>
@endif
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/jquery-datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>

  {{-- 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>
 --}}

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
    
    } );
} );
</script>



</body>