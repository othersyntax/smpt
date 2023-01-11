<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PusatTanggungjawab extends Model
{
    use HasFactory;
    use HasFactory;    
    public $table = 'tblptj';
    public $primaryKey = 'ptj_id';
    public $timestamps = false;
}
