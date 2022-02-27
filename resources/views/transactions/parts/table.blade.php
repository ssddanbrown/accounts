<table class="table table-bordered table-hover mb-0">
    <thead>
    <tr>
        <th width="100">Date</th>
        <th width="50">ID</th>
        <th width="160">Category</th>
        <th>Payee/Payer</th>
        <th>Description</th>
        <th width="100" class="text-end">Value</th>
        <th width="32" class="text-end"></th>
        <th width="32" class="text-end"></th>
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
            <td class="small">{{ $transaction->category->name ?? '' }}</td>
            <td class="small">
                <a href="{{ route('transaction-view.all', ['transacted_with' => $transaction->transacted_with, 'date_from' => '2000-01-01', 'date_to' => '2100-01-01']) }}"
                   class="text-reset">{{ $transaction->transacted_with }}</a>
            </td>
            <td class="small">{{ $transaction->description }}</td>
            <td class="text-danger text-end">{{ money($transaction->value)->html() }}</td>
            <td class="text-end">
                @if($transaction->attachments_count > 0)
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                        <title>Has Attachment</title>
                        <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                    </svg>
                @endif
            </td>
            <td class="text-end">
                @if($transaction->notes)
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                        <title>Has Note</title>
                        <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1h-11zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293L9 13.793z"/>
                    </svg>
                @endif
            </td>
            <td class="text-end">
                <a href="{{ route('transaction.show', compact('transaction')) }}">View</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
