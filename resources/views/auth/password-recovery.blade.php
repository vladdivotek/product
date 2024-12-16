<h1>Password recovery</h1>
@if(session('password_recovery'))
    <div class="alert alert-success mb-0">
        {{ session('password_recovery') }}
    </div>
@else
    <form method="post" action="{{ route('password.recovery') }}">
        @include('include.alerts')
        @csrf
        <input type="email" name="email">
        <button type="submit">Recovery</button>
    </form>
@endif
