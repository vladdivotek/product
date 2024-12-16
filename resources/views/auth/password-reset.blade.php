<h1>Password reset</h1>
@if(session('password_reset'))
    {{ session('password_reset') }}
    <a href="{{ route('login') }}">Login</a>
@else
    <form method="post" action="{{ route('password.store') }}">
        @include('include.alerts')
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="password" name="password_confirmation">
        <button type="submit">Reset</button>
    </form>
@endif
