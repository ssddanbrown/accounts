<div class="card mb-3">
    <div class="card-body">
        <p class="mb-1 show-whitespace">{{ $note->text }}</p>
        <div class="small text-muted">
            <i>Written {{ $note->created_at->diffForHumans() }}</i> |
            <a href="{{ route('note.edit', compact('note')) }}">Edit</a>
        </div>
    </div>
</div>
