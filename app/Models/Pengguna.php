<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    public $table = 'tbluser';
    public $primaryKey = 'user_id';
    public $timestamps = false;
}
