<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rack_tbl extends Model
{
    use HasFactory;

    protected $fillable = ['rack', 'stats'];
}
