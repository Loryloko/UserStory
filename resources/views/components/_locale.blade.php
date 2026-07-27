<form action="{{route('setLocale', $lang)}}" method="POST" class="m-0 p-0 d-flex justify-content-center">
    @csrf
    <button type="submit" class="btn p-0 border-0 bg-transparent py-1 px-2 d-flex align-items-center">
        <img src="{{asset('vendor/blade-flags/country-'.$lang.'.svg')}}" width="32" height="32">
    </button>
</form>