<form
     @if($attributes->has('id'))
      id="{{ $attributes->get('id') }}"
     @endif
      action="{{ $attributes->get('action') }}"
      method="{{ strtolower($attributes->get('method')) === 'get' ? 'GET' : 'POST' }}">

    @if(strtolower($attributes->get('method')) !== 'get')
        {{ csrf_field() }}
        {{ method_field($attributes->get('method')) }}
    @endif

    {{ $slot }}
</form>
