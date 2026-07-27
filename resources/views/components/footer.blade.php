<footer class="bg-dark text-white pt-4 pb-2 mt-auto border-top border-secondary">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <h5 class="fw-bold mb-1 text-uppercase">
                    <i class="bi bi-lightning-charge-fill text-warning me-1"></i>Presto.it
                </h5>
                <p class="small text-white-50 mb-2">{{ __('ui.footerDescription') }}</p>
                
                <a href="{{ route('become.revisor.form') }}" class="text-white-50 small text-decoration-none d-inline-flex align-items-center opacity-75 hover-opacity-100">
                    <i class="bi bi-briefcase-fill me-1"></i> {{ __('ui.workWithUs') }}
                </a>
            </div>
            
            <div class="col-md-6 text-center text-md-end">
                <div class="mb-2">
                    <a href="#" class="text-white me-3 fs-5"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3 fs-5"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white me-3 fs-5"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-white fs-5"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

        </div>

        <hr class="bg-secondary my-3">
        <div class="row">
            <div class="col text-center">
                <p class="small text-white-50 mb-0">&copy; {{ date('Y') }} Presto.it. {{ __('ui.allRightsReserved') }}</p>
            </div>
        </div>
    </div>
</footer>
