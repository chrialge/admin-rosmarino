@if (Str::contains(session('message'), 'cancellato'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('message') }}

    </div>
@elseif (@session('message'))
    <div id="session" class="session_success" role="alert">
        <div class="left_session">
            <i class="ri-check-fill"></i>
            {{ session('message') }}

        </div>

        <i class="ri-close-large-fill" onclick="closeSession()"></i>
    </div>
@endif
