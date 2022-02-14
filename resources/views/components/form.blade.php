<form
      {{ $attributes->only(['id', 'enctype', 'class']) }}
      action="{{ $attributes->get('action') }}"
      method="{{ strtolower($attributes->get('method')) === 'get' ? 'GET' : 'POST' }}">

    @if(strtolower($attributes->get('method')) !== 'get')
        {{ csrf_field() }}
        {{ method_field($attributes->get('method')) }}
    @endif

    {{ $slot }}
</form>
