  <button class="btn" onclick="window.location='{{ route(request()->segments(1)[0] . '.index') }}'">{{ $slot }}</button>
