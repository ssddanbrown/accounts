<x-app-layout title="Transactions">

    <div class="container">

        <div class="row align-items-center mb-2">
            <div class="col-md-4 d-flex">
                <h2 class="fs-6">All Transactions</h2>
            </div>
            <div class="col-md-4 small">
                <span>Total Value: {{ money($totalValue)->html() }}</span>
            </div>
            <div class="col-md-4 text-sm-end">
                <a class="btn btn-link" href="{{ route('transaction.create') }}">Add Transaction</a>
            </div>
        </div>

        <x-form method="get">
            <div class="border border-1 pt-3 px-3 d-flex gap-3 mb-3 rounded align-items-end">
                <x-input name="date_from" type="date" value="{{ $dateFrom }}">Date From</x-input>
                <x-input name="date_to" type="date" value="{{ $dateTo }}">Date To</x-input>
                <div class="pb-3">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </div>
        </x-form>

        <div class="card mb-5">
            @include('transactions.parts.table', [compact('transactions')])
        </div>

        {{ $transactions->links() }}

    </div>
</x-app-layout>
