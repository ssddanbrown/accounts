<?php

namespace App\View\Components;

use App\Models\Transaction;
use Illuminate\View\Component;

class TransactedWithDataList extends Component
{

    public string $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function options(): array
    {
        return Transaction::query()->select('transacted_with')
            ->distinct('transected_with')
            ->pluck('transacted_with')
            ->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.transacted-with-data-list');
    }
}
