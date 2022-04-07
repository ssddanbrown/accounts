<div class="row align-items-center my-2">
    <div class="col-md-4 d-flex">
        <h2 class="fs-6">{{ $title }}</h2>
    </div>
    <div class="col-md-4 small">
        <span class="mx-1">In: {{ money($totals['in'])->html() }}</span>
        <span class="mx-1">Out: {{ money($totals['out'])->html() }}</span>
        <span class="mx-1">Total: {{ money($totals['sum'])->html() }}</span>
    </div>
    <div class="col-md-4 text-sm-end">
        <a class="btn btn-link" href="{{ route('transaction.create') }}">Add Transaction</a>
    </div>
</div>
