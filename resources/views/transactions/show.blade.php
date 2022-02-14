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

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-5">
                    @include('transactions.parts.attachment-list', ['attachments' => $transaction->attachments])
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <x-form action="{{ route('attachment.store', compact('transaction')) }}"
                                enctype="multipart/form-data"
                                method="POST">
                            <div class="file-upload-zone {{ $errors->has('file') ? 'is-invalid' : '' }}">
                                <label for="file-upload-size">
                                    Click here or drop file to upload
                                </label>
                                <input id="file-upload-size"
                                       type="file"
                                       name="file"
                                       onchange="this.closest('form').submit()">
                            </div>
                            <x-input-errors name="file"/>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
