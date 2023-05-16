<div class="row">
    <div class="col-md-6">
        <div class="row mb-4 align-items-center">
            <div class="col-8">
                <x-input name="transacted_at"
                         type="date"
                         :value="$transaction ? $transaction->transacted_at->format('Y-m-d') : now()->subMonth()->startOfMonth()->format('Y-m-d')">Transaction Date</x-input>
            </div>
            <div class="col-4">
                <div class="btn-group-sm btn-group">
                    <button type="button" class="btn btn-outline-primary" data-date-change="+m">+M</button>
                    <button type="button" class="btn btn-outline-primary" data-date-change="-m">-M</button>
                    <button type="button" class="btn btn-outline-primary" data-date-change="+d">+D</button>
                    <button type="button" class="btn btn-outline-primary" data-date-change="-d">-D</button>
                </div>
            </div>
        </div>
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

<script type="module">
    // Handle date input control buttons
    const dateActionButtons = document.querySelectorAll('[data-date-change]');
    const dateInput = document.getElementById('input_transacted_at');
    const dateActions = {
        '+m': (date) => {
            date.setMonth(date.getMonth() + 1)
        },
        '-m': (date) => {
            date.setMonth(date.getMonth() - 1)
        },
        '+d': (date) => {
            date.setDate(date.getDate() + 1)
        },
        '-d': (date) => {
            date.setDate(date.getDate() - 1)
        }
    }
    function handleDateInputAction (actionLabel) {
        const val = dateInput.valueAsDate;
        if (!val) {
            return;
        }

        dateActions[actionLabel](val);
        dateInput.valueAsDate = val;
        dateInput.dispatchEvent(new InputEvent('change'));
    }

    for (const dateActionButton of dateActionButtons) {
        dateActionButton.addEventListener('click', e => {
            e.preventDefault();
            handleDateInputAction(dateActionButton.getAttribute('data-date-change'));
        });
    }


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
