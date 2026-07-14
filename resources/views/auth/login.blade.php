<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm p-4 bg-white rounded-3 border-0">
                <h3 class="mb-4 text-center fw-bold text-navy">Accedi a Presto.it</h3>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-teal w-100 py-2 fw-bold text-uppercase">Accedi</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
