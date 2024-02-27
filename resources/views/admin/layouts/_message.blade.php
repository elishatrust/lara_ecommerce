@if (!empty(session('success')))
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (!empty(session('error')))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif





{{--
<div class="card-body">
    <button type="button" class="btn btn-success swalDefaultSuccess">
      Launch Success Toast
    </button>
    <button type="button" class="btn btn-info swalDefaultInfo">
      Launch Info Toast
    </button>
    <button type="button" class="btn btn-danger swalDefaultError">
      Launch Error Toast
    </button>
    <button type="button" class="btn btn-warning swalDefaultWarning">
      Launch Warning Toast
    </button>
    <button type="button" class="btn btn-default swalDefaultQuestion">
      Launch Question Toast
    </button>
    <div class="text-muted mt-3">
      For more examples look at <a href="https://sweetalert2.github.io/">https://sweetalert2.github.io/</a>
    </div>
  </div> --}}
