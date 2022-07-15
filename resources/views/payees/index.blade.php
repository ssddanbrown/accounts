<x-app-layout title="Categories">


    <div class="container">

        <h2 class="fs-6 mb-2">Payees</h2>

        @foreach($payees as $payee)
            <a href="{{ route('transaction-view.payee', ['payee' => $payee]) }}" class="card mb-3">
                <div class="card-body">
                    <p class="mb-1">{{ $payee }}</p>
                </div>
            </a>
        @endforeach

    </div>

</x-app-layout>
