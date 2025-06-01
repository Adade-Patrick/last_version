<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Mot de passe</label>
    <input type="password" name="password" required>

    <label>Confirmer mot de passe</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Réinitialiser</button>
</form>
