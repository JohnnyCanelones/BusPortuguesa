@include('layouts.app')

<div class="login-background">
    <div class="background-content2">
        <div class="container" style="padding-top: 8vh !important;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reestablecer Contraseña') }}</div>

                        <div class="card-body">
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

                            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                @csrf

                                <div class="form-group row ">
                                    <label for="email" class="col-md-4 col-form-label text-md-center">{{ __('Correo Electronico') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group  mb-0 mt-5">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary boton-verde">
                                            {{ __('Enviar enlace de reseteo') }}
                                        </button>
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


