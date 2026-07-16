<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
  <body class="min-vh-100 d-flex flex-column bg-light">
    <x-nav/>

    @if (session()->has('successMessage'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm border-0" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div>{{ session('successMessage') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <main class="py-4 pb-5">
    {{$slot}}
    </main>

    <x-footer/>

  </body>
</html>