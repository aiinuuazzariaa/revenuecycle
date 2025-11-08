<?php

namespace App\Models;

use App\Models\Income;
use App\Models\Pihutang;
use App\Models\JurnalUmum;
use App\Models\BukuBesar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountNumber extends Model
{
    use HasFactory;

    protected $table = 'account_numbers';

    protected $guarded = ['id'];

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function pihutangs()
    {
        return $this->hasMany(Pihutang::class);
    }

    public function jurnalUmum()
    {
        return $this->hasMany(JurnalUmum::class, 'account_number_id', 'id')->orderBy('created_at');
    }

    public function bukuBesar()
    {
        return $this->hasMany(BukuBesar::class, 'account_number_id', 'id');
    }
}
