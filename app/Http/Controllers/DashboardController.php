<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $recentTransactions = Transaction::query()
            ->orderBy('transacted_at', 'desc')
            ->take(20)
            ->get();

        return view('dashboard.index', [
            'recentTransactions' => $recentTransactions,
        ]);
    }
}
