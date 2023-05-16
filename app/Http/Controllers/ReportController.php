<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function summary(Request $request): View
    {
        $lastMonth = Carbon::now()->subMonth()->format('Y-m');
        $yearMonthFrom = $request->get('from', $lastMonth);
        $yearMonthTo = $request->get('to', $lastMonth);

        $dateFrom = Carbon::createFromFormat('Y-m', $yearMonthFrom)->startOfMonth();
        $dateTo = Carbon::createFromFormat('Y-m', $yearMonthTo)->endOfMonth();

        $categorisedTransactions = Transaction::query()->select([
            'category_id',
            DB::raw('categories.short_name || \' \' || categories.name as category_name'),
            DB::raw('count(transactions.id) as transaction_count'),
            DB::raw('sum(value) as value'),
            DB::raw('sum(case when value > 0 then value else 0 end) as income'),
            DB::raw('sum(case when value < 0 then value else 0 end) as outcome'),
        ])
            ->where('transacted_at', '>=', $dateFrom)
            ->where('transacted_at', '<=', $dateTo)
            ->groupBy('category_id')
            ->leftJoin('categories', 'transactions.category_id', '=', 'categories.id')
            ->orderBy('categories.name', 'asc')
            ->get();

        $totals = [
            'transaction_count' => 0,
            'income' => 0,
            'outcome' => 0,
            'value' => 0,
        ];

        foreach ($categorisedTransactions as $transaction) {
            $totals['transaction_count'] += $transaction->transaction_count;
            $totals['income'] += $transaction->income;
            $totals['outcome'] += $transaction->outcome;
            $totals['value'] += $transaction->value;
        }

        return view('reports.summary', [
            'results' => $categorisedTransactions,
            'totals' => $totals,
            'yearMonthFrom' => $yearMonthFrom,
            'yearMonthTo' => $yearMonthTo,
        ]);
    }
}
