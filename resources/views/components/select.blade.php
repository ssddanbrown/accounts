<div class="mb-3">
    <label for="select_{{ $attributes->get('name') }}"
           class="form-label">{{ $slot }}</label>
    <select id="select_{{ $attributes->get('name') }}"
           {{ $attributes->only(['name', 'autocomplete']) }}
           class="form-control {{ $errors->has($attributes->get('name')) ? 'is-invalid' : '' }}">
        @foreach($attributes->get('options') as $value => $label)
            <option value="{{ $value }}" @if((old($attributes->get('name')) ?? $attributes->get('value') ?? '') === $value) selected @endif>{{ $label }}</option>
        @endforeach
    </select>
    <x-input-errors :name="$attributes->get('name')"/>
</div>
