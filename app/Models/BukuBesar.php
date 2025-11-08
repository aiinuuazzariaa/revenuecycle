<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesar extends Model
{
    /** @use HasFactory<\Database\Factories\BukuBesarFactory> */
    use HasFactory;
    protected $table = 'buku_besars';

     protected $fillable = [
        'account_number_id',
        'income_id',
        'pihutang_id',
        'name',
        'debit',
        'credit',
        'saldo',
    ];

    public function income()
    {
        return $this->belongsTo(Income::class, 'income_id', 'id');
    }

    public function pihutang()
    {
        return $this->belongsTo(Pihutang::class, 'pihutang_id', 'id');
    }

    public function accountNumber()
    {
        return $this->belongsTo(AccountNumber::class,  'account_number_id');
    }

    public function jurnalUmum()
    {
        return $this->hasOne(JurnalUmum::class);
    }
}
