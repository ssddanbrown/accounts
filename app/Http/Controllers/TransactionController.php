<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {

    }

    public function update(Request $request, Transaction $transaction)
    {

    }

    public function delete(Transaction $transaction)
    {

    }
}
