<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        
        <!-- Logo del sito -->
        <a class="navbar-brand fw-bold fs-4" href="/">
            <i class="bi bi-lightning-charge-fill text-warning me-1"></i>Presto.it
        </a>
        
        <!-- Bottone hamburger per smartphone -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3 pt-3 pt-lg-0 align-items-lg-center">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                </li>
                
                <!-- LINK AGGIUNTO PER LA USER STORY #2 -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('announcements.index') }}">Tutti gli Annunci</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm fw-bold px-3 text-white d-inline-block" href="{{ route('announcements.create') }}">
                            <i class="bi bi-plus-circle-fill me-1"></i>Inserisci Annuncio
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm px-3" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm px-3" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endauth

            </ul>
        </div>

    </div>
</nav>
