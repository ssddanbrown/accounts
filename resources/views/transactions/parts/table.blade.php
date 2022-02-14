<table class="table table-bordered table-hover mb-0">
    <thead>
    <tr>
        <th width="100">Date</th>
        <th width="60">ID</th>
        <th>Payee/Payer</th>
        <th>Description</th>
        <th width="100" class="text-end">Value</th>
        <th width="100" class="text-end">VAT</th>
        <th width="100" class="text-end"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->transacted_at->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('transaction.show', compact('transaction')) }}">#{{ $transaction->id }}</a>
            </td>
            <td>{{ $transaction->transacted_with }}</td>
            <td>{{ $transaction->description }}</td>
            <td class="text-danger text-end">{{ money($transaction->value)->html() }}</td>
            <td class="text-end">{{ money($transaction->vat)->html() }}</td>
            <td class="text-end">
                <a href="{{ route('transaction.show', compact('transaction')) }}">View</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
