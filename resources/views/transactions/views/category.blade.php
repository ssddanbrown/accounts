<x-app-layout title="{{ $category->name }} Transactions">

    <div class="container">

        @include('transactions.parts.table-header', ['title' => 'By Category: ' . $category->name ])

        <div class="card mb-5">
            @include('transactions.parts.table', [compact('transactions')])
        </div>

        {{ $transactions->links() }}
    </div>
</x-app-layout>
