<x-app-layout title="Notes">


    <div class="container">

        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h2 class="fs-6">Notes</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <a class="btn btn-link" href="{{ route('note.create') }}">New</a>
            </div>
        </div>

        @foreach($notes as $note)
            @include('notes.parts.note-card', ['note' => $note])
        @endforeach

    </div>

</x-app-layout>
