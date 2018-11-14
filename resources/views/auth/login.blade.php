@include('layouts.app')

{{-- @section('content') --}}
<div class="login-background">
    <div class="background-content2">

        <div class="container " style="padding-top: 8vh; ">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">{{ __('Login') }}</div>

                        <div class="card-body text center">
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf

                                <div class="form-group  text-center">
                                    {{-- <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div> --}}
                                    <label for="username" class="text-center" style="position: unset;">{{ __('Usuario') }}</label>

                                    <div class="col-md-12" >
                                        <input id="username" type="username" class="input-sm form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    swal(
                                                    'Error!',
                                                    'Uno de los campos que ingreso es incorrecto' ,
                                                    'error'
                                                    )
                                                })
                                            </script>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <label for="password" class="text-center" style="position: unset;">{{ __('Contraseña') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-1 text-left">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recuerdame') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn boton-verde">
                                            {{ __('Login') }}
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste la contraseña?') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>


{{-- @endsection --}}
