@if (request()->wasFromTurboFrame() && session()->has('notice'))
    {{ turbo_stream()->flash(session('notice')) }}
@endif
