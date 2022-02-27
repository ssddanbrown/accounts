<x-app-layout title="Add Category">


    <div class="container">

        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Add Category</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <button form="category-form" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="category-form"
                        action="{{ route('category.store') }}"
                        method="post">
                    @include('categories.parts.form', ['category' => null])
                </x-form>
            </div>
        </div>

    </div>

</x-app-layout>
