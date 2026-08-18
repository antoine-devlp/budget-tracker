<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['amount', 'label', 'transaction_date', 'category_id'];
    protected $casts = ['transaction_date' => 'date',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCurrentMonth($query)
    {
        return $query->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year);
    }
    public function scopePreviousMonths($query)
    {
        return $query->where('transaction_date', '<', now()->startOfMonth());
    }
}
