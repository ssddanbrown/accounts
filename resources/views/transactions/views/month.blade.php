<x-app-layout title="{{ $yearMonth }} Transactions">

    <div class="container">

        @foreach(array_slice($months, 0, 12) as $month)
            <a class="btn btn-sm btn-outline-dark" href="{{ route('transaction-view.month', ['yearMonth' => $month]) }}">{{ $month }}</a>
        @endforeach

        @include('transactions.parts.table-header', ['title' => 'By Month: ' . $yearMonth ])

        <div class="card mb-5">
            @include('transactions.parts.table', [compact('transactions')])
        </div>

        {{ $transactions->links() }}
    </div>
</x-app-layout>
