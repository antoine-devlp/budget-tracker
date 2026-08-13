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
        $total =  $request->user()->transactions()->sum('amount');
        $categories = $request->user()->categories()->withSum('transactions', 'amount')->get();

        return view('summary', ['total' => $total, 'categories' => $categories]);
    }
}
