<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\View\View;

class PayeeController extends Controller
{
    public function index(): View
    {
        $payees = Transaction::query()->toBase()
            ->select('transacted_with')
            ->distinct()
            ->get()
            ->sortBy('transacted_with')
            ->pluck('transacted_with');

        return view('payees.index', [
            'payees' => $payees,
        ]);
    }
}
