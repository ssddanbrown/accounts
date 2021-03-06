<div class="mb-3">
    <label for="input_{{ $attributes->get('name') }}"
           class="form-label">{{ $slot }}</label>
    <textarea id="input_{{ $attributes->get('name') }}"
              name="{{ $attributes->get('name') }}"
              rows="{{ $attributes->get('rows') ?? 5 }}"
              columns="{{ $attributes->get('columns') ?? 5 }}"
              class="form-control {{ $errors->has($attributes->get('name')) ? 'is-invalid' : '' }}">{{ old($attributes->get('name')) ?? $attributes->get('value') ?? '' }}</textarea>
    <x-input-errors :name="$attributes->get('name')"/>
</div>
