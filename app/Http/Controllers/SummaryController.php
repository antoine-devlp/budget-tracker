<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $total = $request->user()->transactions()
            ->currentMonth()
            ->sum('amount');
        $categories = $request->user()->categories()
            ->withSum(['transactions' => fn($q) => $q
                ->currentMonth()], 'amount')
            ->get();
        $uncategorized = $request->user()->transactions()
            ->whereNull('category_id')
            ->currentMonth()
            ->sum('amount');
        $monthly = $request->user()->transactions()
            ->previousMonths()
            ->selectRaw('YEAR(transaction_date) as year, MONTH(transaction_date) as month, SUM(amount) as total')
            ->groupBy('year', 'month')
            ->orderByDesc('year')
            ->orderByDesc('month')
            ->limit(6)
            ->get();
        return view('summary', [
            'total' => $total,
            'categories' => $categories,
            'uncategorized' => $uncategorized,
            'monthly' => $monthly
        ]);
    }
}
