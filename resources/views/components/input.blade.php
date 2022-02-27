<div class="mb-3">
    <label for="input_{{ $attributes->get('name') }}"
           class="form-label">{{ $slot }}</label>
    <input id="input_{{ $attributes->get('name') }}"
           {{ $attributes->only(['name', 'list', 'type', 'autocomplete']) }}
           class="form-control {{ $errors->has($attributes->get('name')) ? 'is-invalid' : '' }}"
           value="{{ old($attributes->get('name')) ?? $attributes->get('value') ?? '' }}">
    <x-input-errors :name="$attributes->get('name')"/>
</div>
