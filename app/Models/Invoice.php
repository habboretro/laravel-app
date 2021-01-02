<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'price', 'payment_status',
        'user_id', 'claimed',
    ];

    /**
     * User that belongs to the news article.
     * 
     * @var \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if invoice is paid.
     * 
     * @return boolean
     */
    public function getPaidAttribute()
    {
        return $this->payment_status != 'Invalid';
    }
}
