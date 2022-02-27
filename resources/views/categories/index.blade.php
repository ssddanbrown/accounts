<x-app-layout title="Categories">


    <div class="container">

        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Categories</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <a class="btn btn-link" href="{{ route('category.create') }}">New</a>
            </div>
        </div>

        @foreach($categories as $category)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="small text-muted float-end">
                        <a href="{{ route('category.edit', compact('category')) }}">Edit</a>
                    </div>
                    <p class="mb-1">{{ $category->name }}</p>
                </div>
            </div>
        @endforeach

    </div>

</x-app-layout>
