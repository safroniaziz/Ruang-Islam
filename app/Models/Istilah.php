<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Istilah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id','nm_istilah','arti','keterangan'
    ];
}
