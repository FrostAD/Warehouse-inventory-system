<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'item_id',
        'ordered_at',
        'quantity',
        'price',
        'arrives_at',
        'arrived',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'item_id' => 'integer',
        'ordered_at' => 'timestamp',
        'price' => 'decimal:2',
        'arrives_at' => 'timestamp',
        'arrived' => 'boolean',
        'user_id' => 'integer',
    ];


    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }

    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class);
    }

    public function staff()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
