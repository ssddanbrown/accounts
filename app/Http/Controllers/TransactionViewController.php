<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TransactionViewController extends Controller
{

    protected function getBaseQuery(): Builder
    {
        return Transaction::query()
            ->orderBy('transacted_at', 'desc')
            ->withCount('attachments')
            ->with('category');
    }

    protected function getTotals(Builder $query): array
    {
        $in = $query->clone()->where('value', '>', 0)->sum('value');
        $out = $query->clone()->where('value', '<', 0)->sum('value');
        return [
            'in' => $in,
            'out' => $out,
            'sum' => $in + $out,
        ];
    }

    public function month(string $yearMonth)
    {
        if ($yearMonth === 'now') {
            return redirect()->route('transaction-view.month', ['yearMonth' => now()->subMonth()->format('Y-m')]);
        }

        $dateFrom = Carbon::createFromFormat('Y-m', $yearMonth)->startOfMonth();
        $dateTo = $dateFrom->clone()->endOfMonth();

        $query = $this->getBaseQuery()
            ->where('transacted_at', '>=', $dateFrom)
            ->where('transacted_at', '<=', $dateTo);

        $months = Transaction::query()->toBase()
            ->selectRaw('distinct substr(transacted_at, 0, 8) as month')
            ->orderBy('month', 'desc')
            ->get()
            ->pluck('month')
            ->toArray();

        return view('transactions.views.month', [
            'transactions' => $query->clone()->paginate(50),
            'totals' => $this->getTotals($query),
            'months' => $months,
            'yearMonth' => $yearMonth,
        ]);
    }

    public function payee(string $payee)
    {
        $query = $this->getBaseQuery()->where('transacted_with', '=', $payee);

        return view('transactions.views.payee', [
            'transactions' => $query->clone()->paginate(),
            'totals' => $this->getTotals($query),
            'payee' => $payee,
        ]);
    }
}
