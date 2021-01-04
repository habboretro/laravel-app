<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'box_id', 'prize_type',
        'prize', 'percentage', 'image',
    ];

    /**
     * The box that the prize is in.
     *
     * @var \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function box(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Box::class);
    }
}
