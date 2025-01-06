<div>
    <div>
        <h1>Create a Link </h1>

        @if($message = session()->get('message'))
        <div>
            {{ $message }}
        </div>
        @endif

        <!-- O csrf é um atalho do blade para acrescentar um token para validar o form que esta vindo do proprio laravel -->
        <form action="{{ route('links/create') }}" method="post">
            @csrf

            <div>
                <input name="name" placeholder="name" type="text" value="{{ old('name') }}">
                @error('name')
                <span> {{ $message }} </span>
                @enderror
            </div>
            <br>
            <div>
                <input name="link" type="text" placeholder="link" value="{{ old('link') }}">
                @error('link')
                <span> {{ $message }} </span>
                @enderror
            </div>
            <br>


            <button>Safe</button>

        </form>

    </div>
</div>