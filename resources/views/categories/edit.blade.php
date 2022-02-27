<x-app-layout title="Category #{{ $category->id }}">


    <div class="container">
        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Category #{{ $category->id }}</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <button form="category-form" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="category-form"
                        action="{{ route('category.update', compact('category')) }}"
                        method="put">
                    @include('categories.parts.form')
                </x-form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center mb-2">
            <h2 class="fs-6">Delete Category</h2>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="category-form"
                        action="{{ route('category.delete', compact('category')) }}"
                        method="delete">
                    <p>
                        Are you sure you want to delete this category?
                    </p>
                    <button class="btn btn-danger">Delete</button>
                </x-form>
            </div>
        </div>
    </div>

</x-app-layout>
