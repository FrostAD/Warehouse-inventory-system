<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'minimum_quantity',
        'auto_fill',
        'manufacturer_id',
        'category_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'decimal:2',
        'auto_fill' => 'boolean',
        'manufacturer_id' => 'integer',
        'category_id' => 'integer',
    ];


    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
    //gets all companies not only manufacturers
    public function manufacturer()
    {
        return $this->belongsTo(\App\Models\Company::class,'id','manufacturer_id');
    }

}
