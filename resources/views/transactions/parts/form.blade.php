<div class="row">
    <div class="col-md-6">
        <x-input name="transacted_at" type="date" :value="$transaction ? $transaction->transacted_at->format('Y-m-d') : ''">Transaction Date</x-input>
        <x-input name="transacted_with" list="transacted-with-list" :value="$transaction->transacted_with ?? ''">Payer/Payee</x-input>
        <x-money-input name="value" :value="$transaction->value ?? 0">Value</x-money-input>
    </div>
    <div class="col-md-6">
        <x-input name="description" :value="$transaction->description ?? ''">Description</x-input>
        <x-textarea name="notes" :value="$transaction->notes ?? ''">Notes</x-textarea>
    </div>
</div>

<x-transacted-with-data-list id="transacted-with-list"/>
