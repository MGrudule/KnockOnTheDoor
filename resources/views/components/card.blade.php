<div class="container">
  <div class="row justify-content-center">
    <div class="col-*">
      <div class="card">
        <div class="card-header">
          <div class="container">
            <div class="row">
              <div class="col" style="max-width: 700px">
                @include('flash::message')
              </div>
            </div>
            <div class="row">
              <div class="col">{{ $title }}</div>
              @isset($links)
              <div class="col-*">{{ $links }}</div>
              @endisset
            </div>
          </div>
        </div>
        <div class="card-body">{{ $slot }}</div>
      </div>
    </div>
  </div>
</div>
