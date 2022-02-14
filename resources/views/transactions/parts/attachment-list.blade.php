<ul class="list-group list-group-flush">
    @if(count($attachments) === 0)
        <li class="list-group-item fst-italic text-muted">
            No attachments uploaded
        </li>
    @endif
    @foreach($attachments as $attachment)
        <li class="list-group-item">
            <div class="row align-items-center">
                <div class="col-5 fw-bold">
                    {{ $attachment->name }}
                </div>
                <div class="col-2 fst-italic">
                    {{ $attachment->sizeFormatted() }}
                </div>
                <div class="col-5 text-end">
                    <a class="btn btn-link" href="{{ route('attachment.show', compact('attachment')) }}" target="_blank">View</a>
                    <a class="btn btn-link" href="{{ route('attachment.show', compact('attachment')) }}?download=true">Download</a>
                    <x-form action="{{ route('attachment.delete', compact('attachment')) }}"
                            method="delete"
                            class="d-inline-block position-relative toggle-block">
                        <button class="btn btn-link" type="button">Delete</button>
                        <div class="toggle-block-content dropdown-menu p-3">
                            <p class="text-danger small">
                                Are you sure you want to delete this attachment?
                            </p>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </x-form>
                </div>
            </div>
        </li>
    @endforeach
</ul>
