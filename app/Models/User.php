<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'real_name', 'password',
        'mail', 'mail_verified', 'account_created',
        'account_day_of_birth', 'last_login', 'last_online',
        'motto', 'look', 'gender',
        'rank', 'credits', 'online',
        'auth_ticket', 'ip_register', 'ip_current',
        'machine_id', 'home_room', 'secret_key',
        'pincode', 'extra_rank', 'balance',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'account_created', 'account_day_of_birth', 'home_room',
        'extra_rank', 'real_name', 'two_factor_enabled',
        'mail_verified', 'password', 'auth_ticket',
        'ip_register', 'ip_current', 'machine_id',
        'secret_key', 'pixels', 'points',
        'pincode',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'account_created' => 'datetime',
        'last_login' => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Indicated if the model should have a rememberToken.
     * 
     * @var bool
     */
    protected $rememberTokenName = false;

    /**
     * Permissions that belongs to the user.
     * 
     * @var \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Permission::class, 'rank');
    }

    /**
     * The user currencies.
     * 
     * @var \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function currencies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserCurrency::class);
    }

    /**
     * The user settings.
     * 
     * @var \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function settings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserSettings::class);
    }

    /**
     * Retrieve the email for password reset.
     * 
     * @return string
     */
    public function getEmailForPasswordReset(): string
    {
        return $this->mail;
    }

    /**
     * Retrieve the email for notifications.
     * 
     * @return string
     */
    public function routeNotificationForMail($notification): string
    {
        return $this->mail;
    }
}
