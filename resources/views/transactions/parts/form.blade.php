<div class="row">
    <div class="col-md-6">
        <x-input name="transacted_at" type="date" :value="$transaction ? $transaction->transacted_at->format('Y-m-d') : now()->subMonth()->startOfMonth()->format('Y-m-d')">Transaction Date</x-input>
        <x-input name="transacted_with" list="transacted-with-list" :value="$transaction->transacted_with ?? ''">Payer/Payee</x-input>
        <x-money-input name="value" :value="$transaction->value ?? 0">Value</x-money-input>
    </div>
    <div class="col-md-6">
        <x-select name="category_id"
                  :options="\App\Models\Category::selectOptionsList()"
                  :value="$transaction->category_id ?? ''">Category</x-select>
        <x-input name="description" :value="$transaction->description ?? ''">Description</x-input>
        <x-textarea name="notes" :value="$transaction->notes ?? ''">Notes</x-textarea>
    </div>
</div>

<script>
    // Highlight specific inputs while their input values match their original
    // values, since changes are generally expected in these inputs.
    const inputsToTrack = ['transacted_at', 'value', 'description', 'notes'];
    for (const inputName of inputsToTrack) {
        const input = document.querySelector(`input[name="${inputName}"], textarea[name="${inputName}"]`);
        const originalVal = input.value;
        if (originalVal) {
            input.classList.add('is-invalid');
        }

        input.addEventListener('change', () => {
            input.classList.toggle('is-invalid', input.value === originalVal);
        });
    }
</script>

<x-transacted-with-data-list id="transacted-with-list"/>
