<x-app-layout>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">

                    <x-form action="{{ route('login.attempt') }}" method="post">
                        {{ csrf_field() }}
                        <x-input name="email">Email Address</x-input>
                        <x-input name="password" type="password">Password</x-input>

                        <div class="text-end">
                            <x-button>Submit</x-button>
                        </div>
                    </x-form>

                </div>
            </div>
        </div>
    </div>

</div>

</x-app-layout>
