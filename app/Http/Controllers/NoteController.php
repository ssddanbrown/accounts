<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected array $rules = [
        'text' => ['string'],
    ];

    public function index(): View
    {
        $notes = Note::query()->orderBy('created_at', 'desc')->get();

        return view('notes.index', compact('notes'));
    }

    public function create(Request $request): View
    {
        $modelId = $request->get('model');
        $model = $modelId ? Note::query()->findOrFail($modelId) : null;

        return view('notes.create', compact('model'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validate($request, $this->rules);

        $note = new Note($validated);
        $note->save();

        $this->showSuccessMessage('Note created!');

        return redirect()->route('note.index');
    }

    public function edit(Note $note): View
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note): RedirectResponse
    {
        $validated = $this->validate($request, $this->rules);

        $note->fill($validated)->save();
        $this->showSuccessMessage('Note updated!');

        return redirect()->route('note.index');
    }

    public function delete(Note $note): RedirectResponse
    {
        $note->delete();

        $this->showSuccessMessage('Note deleted!');

        return redirect()->route('note.index');
    }
}
