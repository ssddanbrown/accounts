<x-app-layout title="Note #{{ $note->id }}">


    <div class="container">
        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Note #{{ $note->id }}</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <button form="note-form" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="note-form"
                        action="{{ route('note.update', compact('note')) }}"
                        method="put">
                    @include('notes.parts.form')
                </x-form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center mb-2">
            <h2 class="fs-6">Delete Note</h2>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <x-form id="note-form"
                        action="{{ route('note.delete', compact('note')) }}"
                        method="delete">
                    <p>
                        Are you sure you want to delete this note?
                    </p>
                    <button class="btn btn-danger">Delete</button>
                </x-form>
            </div>
        </div>
    </div>

</x-app-layout>
