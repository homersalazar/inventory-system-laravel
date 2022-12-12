<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parts_list extends Model
{
    use HasFactory;
    protected $fillable = ['sku', 'b_id', 'details', 'partno', 'serialno', 'end_user', 'u_id', 'r_id', 'min_stock', 'comments', 'stats'];

    protected static function boot()
    {

        parent::boot();

        static::creating(function($model){

            $model->sku = str_pad(Parts_list::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }
}
