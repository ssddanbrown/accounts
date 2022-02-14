<x-app-layout title="Transaction #{{ $transaction->id }}">


    <div class="container">
        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Transaction #{{ $transaction->id }}</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <button form="transaction-form" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="transaction-form"
                        action="{{ route('transaction.update', compact('transaction')) }}"
                        method="put">
                    @include('transactions.parts.form')
                </x-form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center mb-2">
            <h2 class="fs-6">Delete Transaction</h2>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="transaction-form"
                        action="{{ route('transaction.delete', compact('transaction')) }}"
                        method="delete">
                    <p>
                        This will delete this transaction in addition to everything linked to it.
                        <br>
                        Are you sure you want to do this?
                    </p>
                    <button class="btn btn-danger">Delete</button>
                </x-form>
            </div>
        </div>
    </div>

</x-app-layout>
