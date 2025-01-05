<div>
    <div>
        <h1>Login </h1>

        @if($message = session()->get('message'))
        <div>
            {{ $message }}
        </div>
        @endif

        <!-- O csrf é um atalho do blade para acrescentar um token para validar o form que esta vindo do proprio laravel -->
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div>
                <input name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <span> {{ $message }} </span>
                @enderror
            </div>
            <br>
            <div>
                <input name="password" type="password" placeholder="Senha">
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <br>

            <button>Login</button>

        </form>

    </div>
</div>