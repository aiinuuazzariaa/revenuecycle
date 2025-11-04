<?php

namespace App\Models;

use App\Models\Income;
use App\Models\Pihutang;
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
}
