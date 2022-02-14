<x-app-layout title="Add Transaction">


    <div class="container">

        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Add Transaction</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <button form="transaction-form" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="transaction-form"
                        action="{{ route('transaction.store') }}"
                        method="post">
                    @include('transactions.parts.form', ['transaction' => null])
                </x-form>
            </div>
        </div>

    </div>

</x-app-layout>
