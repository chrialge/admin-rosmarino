@if (Str::contains(session('message'), 'cancellato'))
    <div id="session" class="session_delete" role="alert">
        <div class="left_session_delete">
            <i class="ri-delete-bin-2-fill"></i>
            {{ session('message') }}

        </div>

        <i class="ri-close-large-fill" onclick="closeSession()"></i>
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
