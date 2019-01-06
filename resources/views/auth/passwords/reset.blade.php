@include('layouts.app')
<div class="login-background">
    <div class="background-content2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reestablecer Contraseña') }}</div>

                        <div class="card-body row">
                            <form method="POST" class="col-md-12" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                                @csrf
                                <div class="row text-md-center" >
                                    
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group col-md-12 text-md-center pt-0">
                                    <label for="email" class="text-md-center" style="position: relative;">{{ __('Correo Electronico') }}</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password" class="  text-md-center" style="position: relative;">{{ __('Contraseña') }}</label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="form-group col-md-6">
                                    <label for="password-confirm" class="  text-md-center" style="position: relative;">{{ __('Confirmar Contraseña') }}</label>

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                </div>


                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-primary boton-verde mx-auto d-block">
                                            {{ __('Reset Password') }}
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
