<div class="mb-3">
    <label for="input_{{ $attributes->get('name') }}"
           class="form-label">{{ $slot }}</label>
    <input id="input_{{ $attributes->get('name') }}"
           name="{{ $attributes->get('name') }}"
           class="form-control {{ $errors->has($attributes->get('name')) ? 'is-invalid' : '' }}"
           type="{{ $attributes->get('type', 'text') }}"
           value="{{ old($attributes->get('name')) ?? $attributes->get('value') ?? '' }}">
    @foreach($errors->get($attributes->get('name')) as $error)
        <div class="invalid-feedback">
            {{ $error }}
        </div>
    @endforeach
</div>
