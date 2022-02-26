<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $recentTransactions = Transaction::query()
            ->orderBy('transacted_at', 'desc')
            ->withCount('attachments')
            ->take(20)
            ->get();

        $latestNote = Note::query()->orderBy('created_at', 'desc')->first();

        return view('dashboard.index', [
            'recentTransactions' => $recentTransactions,
            'latestNote' => $latestNote,
        ]);
    }
}
