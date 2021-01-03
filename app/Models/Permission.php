<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rank_name', 'badge', 'level',
        'room_effect', 'prefix', 'prefix_color',
        'cmd_about', 'cmd_alert', 'cmd_allow_trading',
        'cmd_badge', 'cmd_ban', 'cmd_blockalert',
        'cmd_bots', 'cmd_bundle', 'cmd_calendar',
        'cmd_changename', 'cmd_chatcolor', 'cmd_commands',
        'cmd_connect_camera', 'cmd_control', 'cmd_coords',
        'cmd_credits', 'cmd_danceall', 'cmd_diagonal',
        'cmd_disconnect', 'cmd_duckets', 'cmd_ejectall',
        'cmd_empty', 'cmd_empty_bots', 'cmd_empty_pets',
        'cmd_enable', 'cmd_event', 'cmd_faceless',
        'cmd_fastwalk', 'cmd_filterword', 'cmd_freeze',
        'cmd_freeze_bots', 'cmd_gift', 'cmd_give_rank',
        'cmd_ha', 'acc_can_stalk', 'cmd_hal',
        'cmd_invisible', 'cmd_ip_ban', 'cmd_machine_ban',
        'cmd_hand_item', 'cmd_happyhour', 'cmd_hidewired',
        'cmd_kickall', 'cmd_massbadge', 'cmd_masscredits',
        'cmd_massduckets', 'cmd_massgift', 'cmd_masspoints',
        'cmd_moonwalk', 'cmd_mimic', 'cmd_multi',
        'cmd_mute', 'cmd_pet_info', 'cmd_pickall',
        'cmd_plugins', 'cmd_points', 'cmd_promote_offer',
        'cmd_pull', 'cmd_push', 'cmd_redeem',
        'cmd_reload_room', 'cmd_roomalert', 'cmd_roomcredits',
        'cmd_roomeffect', 'cmd_roomgift', 'cmd_roomitem',
        'cmd_roommute', 'cmd_roompixels', 'cmd_roompoints',
        'cmd_say', 'cmd_say_all', 'cmd_setmax',
        'cmd_set_poll', 'cmd_setpublic', 'cmd_setspeed',
        'cmd_shout', 'cmd_shout_all', 'cmd_shutdown',
        'cmd_sitdown', 'cmd_staffalert', 'cmd_staffonline',
        'cmd_summon', 'cmd_summonrank', 'cmd_super_ban',
        'cmd_stalk', 'cmd_superpull', 'cmd_take_badge',
        'cmd_talk', 'cmd_teleport', 'cmd_trash',
        'cmd_transform', 'cmd_unban', 'cmd_unload',
        'cmd_unmute', 'cmd_update_achievements', 'cmd_update_bots',
        'cmd_update_catalogue', 'cmd_update_config', 'cmd_update_guildparts',
        'cmd_update_hotel_view', 'cmd_update_items', 'cmd_update_navigator',
        'cmd_update_permissions', 'cmd_update_pet_data', 'cmd_update_plugins',
        'cmd_update_polls', 'cmd_update_texts', 'cmd_update_wordfilter',
        'cmd_userinfo', 'cmd_word_quiz', 'cmd_warp',
        'acc_anychatcolor', 'acc_anyroomowner', 'acc_empty_others',
        'acc_enable_others', 'acc_see_whispers', 'acc_superwired',
        'acc_supporttool', 'acc_unkickable', 'acc_guildgate',
        'acc_moverotate', 'acc_placefurni', 'acc_unlimited_bots',
        'acc_unlimited_pets', 'acc_hide_ip', 'acc_not_mimiced',
        'acc_chat_no_flood', 'acc_staff_chat', 'acc_staff_pick',
        'acc_enteranyroom', 'acc_fullrooms', 'acc_infinite_credits',
        'acc_infinite_pixels', 'acc_infinite_points', 'acc_ambassador',
        'acc_debug', 'acc_chat_no_limit', 'acc_chat_no_filter',
        'acc_nomute', 'acc_guild_admin', 'acc_catalog_ids',
        'acc_modtool_ticket_q', 'acc_modtool_user_logs', 'acc_modtool_user_alert',
        'acc_modtool_user_kick', 'acc_modtool_user_ban', 'acc_modtool_room_info',
        'acc_modtool_room_logs', 'acc_trade_anywhere', 'acc_update_notifications',
        'acc_helper_use_guide_tool', 'acc_helper_give_guide_tours', 'acc_helper_judge_chat_reviews',
        'acc_floorplan_editor', 'acc_camera', 'acc_ads_background',
        'cmd_wordquiz', 'acc_room_staff_tags', 'acc_infinite_friends',
        'acc_mimic_unredeemed', 'cmd_update_youtube_playlists', 'cmd_add_youtube_playlist',
        'auto_credits_amount', 'auto_pixels_amount', 'auto_gotw_amount',
        'auto_points_amount', 'acc_mention', 'cmd_setstate',
        'cmd_buildheight', 'cmd_setrotation', 'cmd_sellroom',
        'cmd_buyroom', 'cmd_pay', 'cmd_kill',
        'cmd_hoverboard', 'cmd_kiss', 'cmd_hug',
        'cmd_welcome', 'cmd_disable_effects', 'cmd_brb',
        'cmd_nuke', 'cmd_slime', 'cmd_explain',
        'cmd_closedice', 'acc_closedice_room', 'cmd_set',
        'cmd_furnidata', 'kiss_cmd',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Users in rank.
     * 
     * @var \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'rank');
    }
}
