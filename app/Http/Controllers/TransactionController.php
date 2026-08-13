<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactions = $request->user()->transactions()->with('category')->latest()->get();
        return view('transactions.index', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = $request->user()->categories()->orderBy('name')->get();
        return view('transactions.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'category_id' => ['required', Rule::exists('categories', 'id')->where('user_id', $request->user()->id)]
        ]);
        $request->user()->transactions()->create($data);
        return redirect()->route('transactions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $transaction = $request->user()->transactions()->findOrFail($id);
        $categories = $request->user()->categories()->orderBy('name')->get();
        return view('transactions.edit', ['transaction' => $transaction, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transaction = $request->user()->transactions()->findOrFail($id);
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'category_id' => ['required', Rule::exists('categories', 'id')->where('user_id', $request->user()->id)]
        ]);
        $transaction->update($data);
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $transaction = $request->user()->transactions()->findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index');
    }
}
