<link href="{{asset('css/navbar.css')}}" rel="stylesheet" />

<div>
    <nav class="nav-center">
        @if (request()->is("login") || request()->is("register"))
            <a href="{{url('/')}}">Back</a>
        @else
            @if(session('name') != "")
                <a href="{{url('/logout')}}">Logout</a>
                <a href="{{url('/profile')}}">Profile</a>
                <a href="{{url('/')}}">Home</a>
            @else
                <a href="{{url('/login')}}">Login</a>
                <a href="{{url('/register')}}">Register</a>
            @endif
        @endif
    </nav>
</div>