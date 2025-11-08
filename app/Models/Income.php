<?php

namespace App\Models;

use App\Models\AccountNumber;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Pihutang;
use App\Models\JurnalUmum;
use App\Models\BukuBesar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    /** @use HasFactory<\Database\Factories\IncomeFactory> */
    use HasFactory;
    protected $table = 'incomes';

    protected $guarded = ['id'];

    public function accountNumber()
    {
        return $this->belongsTo(AccountNumber::class,  'account_number_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pihutang()
    {
        return $this->hasOne(Pihutang::class);
    }

    public function jurnalUmum()
    {
        return $this->hasMany(JurnalUmum::class);
    }

    public function bukuBesar()
    {
        return $this->hasMany(BukuBesar::class);
    }
}
