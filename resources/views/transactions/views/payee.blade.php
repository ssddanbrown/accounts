<x-app-layout title="{{ $payee }} Transactions">

    <div class="container">

        @include('transactions.parts.table-header', ['title' => 'By Payee: ' . $payee ])

        <div class="card mb-5">
            @include('transactions.parts.table', [compact('transactions')])
        </div>

        {{ $transactions->links() }}
    </div>
</x-app-layout>
