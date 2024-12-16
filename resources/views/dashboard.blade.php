<h1>Dashboard</h1>
<br>
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
