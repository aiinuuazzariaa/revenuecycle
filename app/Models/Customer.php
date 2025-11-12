<?php

namespace App\Models;

use App\Models\Income;
use App\Models\BukuBesar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $table = 'customers';

    protected $guarded = ['id'];

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function bukuBesar()
    {
        return $this->hasMany(BukuBesar::class);
    }

    public function getPiutangBalanceAttribute()
    {
        return $this->incomes()
            ->where('payment_type', 'Credit')
            ->selectRaw('SUM(total - nominal) as balance')
            ->value('balance') ?? 0;
    }
}
