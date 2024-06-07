@if (session('success') || session('error'))
<div class="toast mb-5 align-items-center text-white show {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        {{ session('success') ?  session('success') : session('error')}}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" onclick="$('.toast').addClass('hide')"  data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

@endif
