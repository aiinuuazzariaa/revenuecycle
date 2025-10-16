<?php

namespace App\Models;

use App\Models\AccountNumber;
use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pihutang extends Model
{
    /** @use HasFactory<\Database\Factories\PihutangFactory> */
    use HasFactory;
    protected $table = 'pihutangs';

    protected $guarded = ['id'];

    public function accountNumber()
    {
        return $this->belongsTo(AccountNumber::class);
    }

    public function income()
    {
        return $this->belongsTo(Income::class);
    }
}
