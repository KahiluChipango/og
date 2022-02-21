@if(session('success'))

    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))

    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if(session('deleted'))

    <div class="alert alert-secondary" role="alert">
        {{ session('deleted') }}
    </div>
@endif

@if(session('edited'))

    <div class="alert alert-info" role="alert">
        {{ session('edited') }}
    </div>
@endif
