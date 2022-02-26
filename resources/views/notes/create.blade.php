<x-app-layout title="Add Note">


    <div class="container">

        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Add Note</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <button form="note-form" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="note-form"
                        action="{{ route('note.store') }}"
                        method="post">
                    @include('notes.parts.form', ['note' => null])
                </x-form>
            </div>
        </div>

    </div>

</x-app-layout>
