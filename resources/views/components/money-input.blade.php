<div class="mb-3">
    <label for="input_{{ $attributes->get('name') }}"
           class="form-label">{{ $slot }}</label>
    <div class="input-group">
        <span class="input-group-text">£</span>
        <input id="input_{{ $attributes->get('name') }}"
               name="{{ $attributes->get('name') }}"
               class="form-control {{ $errors->has($attributes->get('name')) ? 'is-invalid' : '' }}"
               type="number"
               step="0.01"
               value="{{ old($attributes->get('name')) ?? money($attributes->get('value'))->input() ?? '' }}">
    </div>
    @foreach($errors->get($attributes->get('name')) as $error)
        <div class="invalid-feedback">
            {{ $error }}
        </div>
    @endforeach
</div>
