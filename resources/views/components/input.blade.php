<div class="mb-3">
    <label for="input_{{ $attributes->get('name') }}"
           class="form-label">{{ $slot }}</label>
    <input id="input_{{ $attributes->get('name') }}"
           {{ $attributes->only(['name', 'list', 'type', 'autocomplete']) }}
           class="form-control {{ $errors->has($attributes->get('name')) ? 'is-invalid' : '' }}"
           @if(old($attributes->get('name')))
           value="{{ old($attributes->get('name')) }}"
           @else
           value="{!! $attributes->get('value') ?? '' !!}"
        @endif
    >
    <x-input-errors :name="$attributes->get('name')"/>
</div>
