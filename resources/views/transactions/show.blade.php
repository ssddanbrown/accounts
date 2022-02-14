<x-app-layout title="Transaction #{{ $transaction->id }}">


    <div class="container">

        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Transaction #{{ $transaction->id }}</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <a class="btn btn-link" href="{{ route('transaction.edit', compact('transaction')) }}">Edit</a>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <label>Transaction Date</label>
                            <p>{{ $transaction->transacted_at->format('Y-m-d') }}</p>
                        </div>
                        <div>
                            <label>Payer/Payee</label>
                            <p>{{ $transaction->transacted_with }}</p>
                        </div>

                        <div>
                            <label>Value</label>
                            <p>{{ money($transaction->value)->html() }}</p>
                        </div>

                        <div>
                            <label>VAT</label>
                            <p>{{ money($transaction->vat)->html() }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <label>Description</label>
                            <p>{{ $transaction->description ?: '-' }}</p>
                        </div>

                        <div>
                            <label>Notes</label>
                            <p>{{ $transaction->notes ?: '-'}}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row align-items-center mb-2">
            <h2 class="fs-6">Attachments</h2>
        </div>

        <div class="card mb-5">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item">An item</a>
                <a href="#" class="list-group-item">A second item</a>
                <a href="#" class="list-group-item">A third item</a>
            </div>
        </div>

    </div>

</x-app-layout>
