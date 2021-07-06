<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'date',
        'quantity',
        'price',
        'staff_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'item_id' => 'integer',
        'date' => 'timestamp',
        'price' => 'decimal:2',
        'staff_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class);
    }

    public function staff()
    {
        return $this->belongsTo(\App\Models\User::class,'id','staff_id');
    }
}
