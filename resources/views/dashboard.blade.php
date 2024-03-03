{{-- resources/views/dashboard.blade.php --}}
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

