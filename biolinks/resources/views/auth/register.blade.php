<div>
    <div>
        <h1>Register </h1>

        @if($message = session()->get('message'))
        <div>
            {{ $message }}
        </div>
        @endif

        <!-- O csrf é um atalho do blade para acrescentar um token para validar o form que esta vindo do proprio laravel -->
        <form action="{{ route('register') }}" method="post">
            @csrf

            <div>
                <input name="name" placeholder="name" type="text" value="{{ old('name') }}">
                @error('name')
                <span> {{ $message }} </span>
                @enderror
            </div>
            <br>
            <div>
                <input name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <span> {{ $message }} </span>
                @enderror
            </div>
            <br>
            <!-- Para as regras de validacao, o email tem que ter _confirmation para a regra funcionar e validar se esse email é igual ao digitado acima -->
            <div>
                <input name="email_confirmation" type="email">
                @error('email_confirmation')
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

            <button>Register</button>

        </form>

    </div>
</div>