<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'telephone',
        'type_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_id' => 'integer',
    ];


    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class);
    }

    public function producedItems()
    {
        return $this->hasMany(\App\Models\Item::class,'manufacturer_id','id');
    }
}
