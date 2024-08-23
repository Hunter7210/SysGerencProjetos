@extends('layouts.app')

@section('content')
<style>
    .containerLogin {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 90vh;
        align-items: center;
        justify-content: center;

        background-color: antiquewhite
 
    }
    .formlogin{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        padding: 40px;
        border-style: double;
        border-width:2px;

        background-color: whitesmoke
    }

    .form-group{
        margin-top: 20px
    }
</style>
<div class="containerLogin">
    <form method="POST" action="{{ route('usuarios.login') }}" class="formlogin">
        <h2>Login</h2>
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">E-mail</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="emailUsuario" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Senha -->
        <div class="form-group">
            <label for="password">Senha</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Botão de Login -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
    </form>
</div>
@endsection
