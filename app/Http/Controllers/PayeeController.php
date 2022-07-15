<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class PayeeController extends Controller
{
    public function index()
    {
        $payees = Transaction::query()->toBase()
            ->select('transacted_with')
            ->distinct()
            ->get()
            ->sortBy('transacted_with')
            ->pluck('transacted_with');

        return view('payees.index', [
            'payees' => $payees
        ]);
    }
}
