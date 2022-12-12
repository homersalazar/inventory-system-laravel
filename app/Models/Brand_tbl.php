<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand_tbl extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'stats'];
}
