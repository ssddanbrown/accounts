<x-app-layout title="Dashboard">

    <div class="container">

        @if($latestNote)
            <div>
                <h2 class="fs-6">Latest Note</h2>
                @include('notes.parts.note-card', ['note' => $latestNote])
            </div>
        @endif

        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Recent Transactions</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <a class="btn btn-link" href="{{ route('transaction.create') }}">Add Transaction</a>
            </div>
        </div>

        <div class="card mb-5">
            @include('transactions.parts.table', ['transactions' => $recentTransactions])
        </div>

    </div>
</x-app-layout>
