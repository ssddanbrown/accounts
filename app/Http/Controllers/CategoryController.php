<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected array $rules = [
        'name' => ['required', 'string'],
        'short_name' => ['required', 'string'],
    ];

    public function index(): View
    {
        $categories = Category::query()->orderBy('name', 'asc')->get();

        return view('categories.index', compact('categories'));
    }

    public function create(Request $request): View
    {
        $modelId = $request->get('model');
        $model = $modelId ? Category::query()->findOrFail($modelId) : null;

        return view('categories.create', compact('model'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validate($request, $this->rules);

        $category = new Category($validated);
        $category->save();

        $this->showSuccessMessage('Category created!');

        return redirect()->route('category.index');
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $this->validate($request, $this->rules);

        $category->fill($validated)->save();
        $this->showSuccessMessage('Category updated!');

        return redirect()->route('category.index');
    }

    public function delete(Category $category): RedirectResponse
    {
        $category->transactions()->update(['category_id' => null]);
        $category->delete();

        $this->showSuccessMessage('Category deleted!');

        return redirect()->route('category.index');
    }
}
