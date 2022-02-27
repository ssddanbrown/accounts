<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionViewController extends Controller
{
    public function all(Request $request)
    {
        $dateFrom = $request->get('date_from') ?? now()->setDay(1)->format('Y-m-d');
        $dateTo = $request->get('date_to') ?? now()->addMonth()->setDay(0)->format('Y-m-d');
        $query = Transaction::query()
            ->orderBy('transacted_at', 'desc')
            ->where('transacted_at', '>=', $dateFrom)
            ->where('transacted_at', '<=', $dateTo)
            ->withCount('attachments')
            ->with('category');

        if ($request->has('transacted_with')) {
            $query->where('transacted_with', '=', $request->get('transacted_with'));
        }

        $transactions = $query->clone()->paginate()->appends([
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
        ]);
        $totalValue = $query->clone()->sum('value');

        return view('transactions.views.all', compact(
            'transactions',
            'totalValue',
            'dateTo',
            'dateFrom',
        ));
    }
}
