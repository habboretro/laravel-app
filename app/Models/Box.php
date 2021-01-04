<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'price',
        'currency_type',
    ];

    /**
     * The box prizes.
     *
     * @var \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prizes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Prize::class);
    }
}
