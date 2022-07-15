<x-app-layout title="{{ $searchTerm }} Transactions">

    <div class="container">

        <p>
            Search is ran across payee/payer, description & notes.
        </p>

        @include('transactions.parts.table-header', ['title' => 'By SearchTerm: ' . $searchTerm ])

        <div class="card mb-5">
            @include('transactions.parts.table', [compact('transactions')])
        </div>

        {{ $transactions->links() }}
    </div>
</x-app-layout>
