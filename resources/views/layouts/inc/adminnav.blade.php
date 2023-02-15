<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#pablo"> Dashboard </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        {{-- <i class="nc-icon nc-palette"></i> --}}
                        <span class="d-lg-none">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown nav-item notice">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-planet"></i>
                        <span class="notification">{{ $notices->count() }}</span>
                        <span class="d-lg-none">Notification</span>
                    </a>
                    <ul class="dropdown-menu">
                        @if ($notices)
                            @foreach($notices as $notice)
                            <div class="rrr">
                                <a class="dropdown-item nn" href="#">{{ $notice->type }}</a>
                                <input type="hidden" value="{{$notice->id}}" class="noticeId">
                                <input type="hidden" value="{{$notice->data}}" class="noticeData">
                            </div>
                            @endforeach
                            <hr>
                            <a class="dropdown-item all" href="#">make all as read</a>
                        @else
                            <a class="dropdown-item" href="#">No Notification</a>
                        @endif
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/profile" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::user()->photo)
                            <img src="{{ asset('assets/images/users/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" width="32" height="32" class="rounded-circle">
                        @else
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/profile">profile</a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</nav>