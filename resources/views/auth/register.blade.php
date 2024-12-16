<h1>Registration</h1>
<form method="post" action="{{ route('register') }}">
    @include('include.alerts')
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">Register</button>
</form>
<br>
<div>
    <a href="{{ route('login') }}">Login</a>
</div>
