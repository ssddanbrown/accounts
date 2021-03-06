<div class="container">
    <nav class="d-flex align-items-center text-center py-5">
        <span class="fw-bold"> [ ACCOUNTS ]</span>
        <div class="px-3">
            @auth
                <a class="btn btn-link" href="{{ route('dashboard') }}">Home</a>
                <a class="btn btn-link" href="{{ route('transaction-view.month', ['yearMonth' => 'now']) }}">Transactions</a>
                <a class="btn btn-link" href="{{ route('report.summary') }}">Report</a>
                <a class="btn btn-link" href="{{ route('category.index') }}">Categories</a>
                <a class="btn btn-link" href="{{ route('payee.index') }}">Payees</a>
                <a class="btn btn-link" href="{{ route('note.index') }}">Notes</a>
                <a class="btn btn-link" href="{{ route('logout') }}">Logout</a>
            @endauth
        </div>
        <div class="align-self-center ms-auto">
            <form action="{{ route('transaction-view.search') }}" method="get">
                <input type="text" name="query" placeholder="Search transactions" class="form-control">
                <button style="display: none;">Search</button>
            </form>
        </div>
    </nav>
</div>
