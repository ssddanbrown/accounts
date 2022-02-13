<div class="container">
    <nav class="d-flex text-center py-5">
        <span class="fw-bold"> [ ACCOUNTS ]</span>
        <div class="px-3">
            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @endauth
        </div>
    </nav>
</div>
