@extends('layouts.staff_base')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="" class="card card2">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @foreach($staff as $staff)
                        <a href="">{{ $staff->nationality}}-{{$staff->id}}</a><br>
                        {{ $staff->names}}<br>
                        @if($staff->user) <a href="{{ url('personal/'.$staff->id) }}" class="btn btn-primary">Ver Permisos</a>
                        @else 
                        <a href="{{ url('personal/user') }}" class="btn btn-primary">Crear Usuario</a>
                        @endif
                        <br>
                        <br>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
