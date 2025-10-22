<?php

namespace App\Models;
use App\Models\Income;
use App\Models\Pihutang;
use App\Models\BukuBesar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    /** @use HasFactory<\Database\Factories\JurnalUmumFactory> */
    use HasFactory;
    protected $table = 'jurnal_umums';

    protected $guarded = ['id'];


    public function income()
    {
        return $this->belongsTo(Income::class);
    }

    public function pihutang()
    {
        return $this->belongsTo(Pihutang::class);
    }
    public function bukuBesar()
    {
        return $this->hasOne(BukuBesar::class);
    }
}
