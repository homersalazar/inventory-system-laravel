<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch_tbl extends Model
{
    use HasFactory;
    protected $fillable = ['branch','street','city','states','zip','stats'];
}


