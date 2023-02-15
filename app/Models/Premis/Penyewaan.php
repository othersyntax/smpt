<?php

namespace App\Models\Premis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    public $table = 'pre_tblsewa';
    public $primaryKey = 'penyewaan_id';
    public $timestamps = false;
}
