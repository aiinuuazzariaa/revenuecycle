<?php

namespace App\Models;
use App\Models\JurnalUmum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesar extends Model
{
    /** @use HasFactory<\Database\Factories\BukuBesarFactory> */
    use HasFactory;
    protected $table = 'buku_besars';

    protected $guarded = ['id'];


    public function jurnalUmum()
    {
        return $this->belongsTo(JurnalUmum::class);
    }
}
