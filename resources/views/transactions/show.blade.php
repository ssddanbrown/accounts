<x-app-layout title="Transaction #{{ $transaction->id }}">


    <div class="container">

        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Transaction #{{ $transaction->id }}</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <a class="btn btn-link" href="{{ route('transaction.create') }}">New</a>
                |
                <a class="btn btn-link" href="{{ route('transaction.copy', compact('transaction')) }}">Copy</a>
                |
                <a class="btn btn-link" href="{{ route('transaction.edit', compact('transaction')) }}">Edit</a>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <label>Transaction Date</label>
                            <p>
                                <a href="{{ route('transaction-view.month', ['yearMonth' => $transaction->transacted_at->format('Y-m')]) }}">
                                    {{ $transaction->transacted_at->format('Y-m-d') }}
                                </a>
                            </p>
                        </div>

                        <div>
                            <label>Payer/Payee</label>
                            <p>
                                <a href="{{ route('transaction-view.payee', ['payee' => $transaction->transacted_with]) }}">
                                    {{ $transaction->transacted_with }}
                                </a>
                            </p>
                        </div>

                        <div>
                            <label>Value</label>
                            <p>{{ money($transaction->value)->html() }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <label>Category</label>
                            <p>{{ $transaction->category->name ?? '-' }}</p>
                        </div>

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
                                <label for="file-upload" id="dropzone">
                                    Click or drop a file here to upload
                                </label>
                                <input id="file-upload"
                                       type="file"
                                       name="file"
                                       onchange="this.closest('form').submit()">
                                <script>
                                    const dropzone = document.getElementById('dropzone');
                                    const fileInput = document.getElementById('file-upload');

                                    fileInput.addEventListener('change', () => fileInput.closest('form').submit());

                                    dropzone.addEventListener('dragover', (e) => e.preventDefault());
                                    dropzone.addEventListener('dragenter', _ => dropzone.classList.toggle('drag-over', true));
                                    dropzone.addEventListener('dragleave', _ => dropzone.classList.toggle('drag-over', false));
                                    dropzone.addEventListener('drop', (e) => {
                                        e.preventDefault();
                                        fileInput.files = e.dataTransfer.files;
                                        fileInput.dispatchEvent(new Event('change', {bubbles: true}));
                                    });
                                </script>
                            </div>
                            <x-input-errors name="file"/>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
