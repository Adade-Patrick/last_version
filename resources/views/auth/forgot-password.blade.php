@if (session('status'))
    <div class="text-green-500">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email">Email</label>
    <input id="email" type="email" name="email" required autofocus>
    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror

    <button type="submit">Envoyer le lien</button>
</form>
