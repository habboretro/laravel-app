<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'achievement_score', 'daily_respect_points',
        'daily_pet_respect_points', 'respects_given', 'respects_received',
        'guild_id', 'can_change_name', 'can_trade',
        'is_citizen', 'citizen_level', 'helper_level',
        'cfh_send', 'cfh_abusive', 'cfh_warnings',
        'cfh_bans', 'block_following', 'block_friendrequests',
        'block_roominvites', 'volume_system', 'volume_furni',
        'volume_trax', 'old_chat', 'block_camera_follow',
        'chat_color', 'home_room', 'online_time',
        'tags', 'club_expire_timestamp', 'login_streak',
        'rent_space_id', 'rent_space_endtime', 'hof_points',
        'block_alerts', 'talent_track_citizenship_level', 'talent_track_helpers_level',
        'ignore_bots', 'ignore_pets', 'nux',
        'mute_end_timestamp', 'allow_name_change',
        'perk_trade', 'forums_post_count', 'ui_flags',
        'has_gotten_default_saved_searches',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * User that belongs to the currency.
     * 
     * @var \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
