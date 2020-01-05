<header>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark elegant-color">
        <a class="navbar-brand" href="/">ProjectView</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <!-- <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Podstrona 1
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Podstrona 2</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Podstrona 3
                    </a>
                    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Podstrona 3.1</a>
                        <a class="dropdown-item" href="#">Podstrona 3.2</a>
                        <a class="dropdown-item" href="#">Podstrona 3.3</a>
                    </div>
                </li>
            </ul> -->
            @if(!Session::get('isLogged'))
            <ul class="navbar-nav ml-auto nav-flex-icons user-header">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="/login">Zaloguj</a>
                    </div>
                </li>
            </ul>
            @endif
            @if(Session::get('isLogged'))
            <ul class="navbar-nav ml-auto nav-flex-icons user-header">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="current-user">{{ Session::get('loggedMail') }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="/logout">Wyloguj</a>
                    </div>
                </li>
            </ul>
            @endif
        </div>
    </nav>
    <!--/.Navbar -->
</header>