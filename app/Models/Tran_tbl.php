<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tran_tbl extends Model
{
    use HasFactory;
    protected $fillable = ['sku',
    'user',
    'location',
    'types',
    'quantity',
    'mpr',
    'unit_cost',
    'unit_refund',
    'drno',
    'rack',
    'received_by',
    'stats',
    'action',
    'date_in'
];

// protected static function boot()
// {

//     parent::boot();

//     static::creating(function($model){

//         $model->sku = str_pad(Tran_tbl::count() + 1, 4, '0', STR_PAD_LEFT);
//     });
// }
}
