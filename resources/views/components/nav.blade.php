<nav class="navbar navbar-expand-lg navbar-dark bg-navy shadow-sm">
    <div class="container">
        
        <!-- Logo del sito -->
        <a class="navbar-brand fw-bold fs-4" href="/">
            <i class="bi bi-lightning-charge-fill text-warning me-1"></i>Presto.it
        </a>
        
        <!-- Bottone per smartphone (hamburger menu) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Link della Navbar -->
        <div class="collapse navbar-collapse d-flex flex-column align-items-end d-lg-block" id="navbarNav">
            
            <ul class="navbar-nav ms-auto align-items-center gap-3 pt-3 pt-lg-0">
                
                <!-- Link visibili a TUTTI -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="/">Home</a>
                </li>

                <!-- Logica di Autenticazione -->
                @auth
                    <!-- Se l'utente è LOGGATO -->
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm fw-bold px-3 text-white" href="/announcements/create">
                            <i class="bi bi-plus-circle-fill me-1"></i>Inserisci Annuncio
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown text-center">
                        <a class="nav-link dropdown-toggle text-white fw-semibold px-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
                        </a>
                        
                        <!-- La tendina si aprirà ordinatamente sotto il profilo -->
                        <div class="dropdown-menu dropdown-menu-end shadow border-0 p-2 mt-1 text-center position-absolute" aria-labelledby="userDropdown" style="min-width: 160px;">
                            <div class="dropdown-header text-muted border-bottom pb-2 mb-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-person me-2"></i> {{ auth()->user()->name }}
                            </div>
                                        
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger fw-semibold rounded-2 py-2 px-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-outline-custom btn-sm px-3" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-teal btn-sm px-3" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endauth

            </ul>
        </div>
        
    </div>
</nav>
