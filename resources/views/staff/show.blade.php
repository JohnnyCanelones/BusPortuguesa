<body> 
@include('layouts.staff_base')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div id="" class='card card2'>
                <div class="card-header">
                    <h3 id="hola" class="azul text-center m-3 ">Personal</h3>
                </div>
                <div class="card-body">
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
                            @forelse($staff as $staff)
                            <tr>
                                <th scope="row">
                                    <a href=""  style="color: #008a34">{{ $staff->nationality}}-{{$staff->id}}</a>
                                </th>
                                <td> {{ $staff->names}}</td>
                                <td> {{ $staff->last_names}}</td>
                                <td>
                                    @if($staff->user) <a href="{{ url('personal/role/'.$staff->id) }}" class="btn btn-primary"  style="color: #008a34">Ver Permisos</a>
                                    @else 
                                    <a href="{{ url('personal/create/user/'. $staff->id) }}" class="btn btn-primary"  style="color: #008a34">Crear Usuario</a>
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
