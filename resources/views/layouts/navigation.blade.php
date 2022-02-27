<div class="container">
    <nav class="d-flex align-items-center text-center py-5">
        <span class="fw-bold"> [ ACCOUNTS ]</span>
        <div class="px-3">
            @auth
                <a class="btn btn-link" href="{{ route('dashboard') }}">Home</a>
                <a class="btn btn-link" href="{{ route('transaction-view.all') }}">Transactions</a>
                <a class="btn btn-link" href="{{ route('category.index') }}">Categories</a>
                <a class="btn btn-link" href="{{ route('note.index') }}">Notes</a>
                <a class="btn btn-link" href="{{ route('logout') }}">Logout</a>
            @endauth
        </div>
    </nav>
</div>
