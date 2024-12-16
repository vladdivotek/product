<h1>Login</h1>
<form method="post" action="{{ route('login') }}">
    @include('include.alerts')
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>
<br>
<div>
    <a href="{{ route('register') }}">Register</a>
    <br>
    <a href="{{ route('password.recovery') }}">Recovery password</a>
</div>
