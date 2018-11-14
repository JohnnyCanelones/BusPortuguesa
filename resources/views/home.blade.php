@include('layouts.staff_base')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div id="" class="card card2">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    

                    You are logged in!
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
<script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>



