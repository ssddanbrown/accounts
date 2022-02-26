<table class="table table-bordered table-hover mb-0">
    <thead>
    <tr>
        <th width="100">Date</th>
        <th width="50">ID</th>
        <th>Payee/Payer</th>
        <th>Description</th>
        <th width="100" class="text-end">Value</th>
        <th width="100" class="text-end"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->transacted_at->format('Y-m-d') }}</td>
            <td>
                <a class="text-muted small"
                   href="{{ route('transaction.show', compact('transaction')) }}">#{{ $transaction->id }}</a>
            </td>
            <td class="small">
                <a href="{{ route('transaction-view.all', ['transacted_with' => $transaction->transacted_with, 'date_from' => '2000-01-01', 'date_to' => '2100-01-01']) }}"
                   class="text-reset">{{ $transaction->transacted_with }}</a>
            </td>
            <td class="small">{{ $transaction->description }}</td>
            <td class="text-danger text-end">{{ money($transaction->value)->html() }}</td>
            <td class="text-end">
                <a href="{{ route('transaction.show', compact('transaction')) }}">View</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
