<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Timothyasp\Color\Color;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Permission extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Permission::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'rank_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'rank_name', 'badge',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Rank Name')
                ->rules('required'),

            Text::make('Badge'),

            Number::make('Level')
                ->hideFromIndex(),

            Text::make('Room Effect')
                ->hideFromIndex(),

            Text::make('Prefix'),

            Color::make('Prefix Color')
                ->compact(),

            Select::make('cmd_about')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_alert')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_allow_trading')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_badge')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_ban')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_blockalert')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_bots')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_bundle')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_calendar')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_changename')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_chatcolor')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_commands')
                ->options(['0', '1'])
                ->hideFromIndex(),
            Select::make('cmd_connect_camera')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_control')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_coords')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_credits')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_danceall')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_diagonal')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_disconnect')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_duckets')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_ejectall')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_empty')
                ->options(['0', '1'])
                ->hideFromIndex(),
            Select::make('cmd_empty_bots')
                ->options(['0', '1'])
                ->hideFromIndex(),
            Select::make('cmd_empty_pets')
                ->options(['0', '1'])
                ->hideFromIndex(),
            Select::make('cmd_enable')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_event')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_faceless')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_fastwalk')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_filterword')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_freeze')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_freeze_bots')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_gift')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_give_rank')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_ha')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_can_stalk')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_hal')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_invisible')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_ip_ban')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_machine_ban')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_hand_item')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_happyhour')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_hidewired')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_kickall')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_softkick')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_massbadge')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_masscredits')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_massduckets')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_massgift')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_masspoints')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_moonwalk')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_mimic')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_multi')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_mute')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_pet_info')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_pickall')
                ->options(['0', '1'])
                ->hideFromIndex(),
            Select::make('cmd_plugins')
                ->options(['0', '1'])
                ->hideFromIndex(),
            Select::make('cmd_points')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_promote_offer')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_pull')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_push')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_redeem')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_reload_room')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_roomalert')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_roomcredits')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_roomeffect')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_roomgift')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_roomitem')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_roommute')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_roompixels')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_roompoints')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_say')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_say_all')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_setmax')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_set_poll')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_setpublic')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_setspeed')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_shout')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_shout_all')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_shutdown')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_sitdown')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_staffalert')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_staffonline')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_summon')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_summonrank')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_super_ban')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_stalk')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_superpull')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_take_badge')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_talk')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_teleport')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_trash')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_transform')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_unban')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_unload')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_unmute')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_achievements')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_bots')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_catalogue')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_config')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_guildparts')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_hotel_view')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_items')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_navigator')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_permissions')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_pet_data')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_plugins')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_polls')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_texts')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_wordfilter')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_userinfo')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_word_quiz')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_warp')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_anychatcolor')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_anyroomowner')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_empty_others')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_enable_others')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_see_whispers')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_superwired')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_supporttool')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_unkickable')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_guildgate')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_moverotate')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_placefurni')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_unlimited_bots')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('acc_unlimited_pets')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('acc_hide_ip')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_hide_mail')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_not_mimiced')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_chat_no_flood')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_staff_chat')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_staff_pick')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_enteranyroom')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_fullrooms')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_infinite_credits')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_infinite_pixels')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_infinite_points')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_ambassador')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_debug')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_chat_no_limit')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_chat_no_filter')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_nomute')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_guild_admin')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_catalog_ids')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_modtool_ticket_q')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_modtool_user_logs')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_modtool_user_alert')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_modtool_user_kick')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_modtool_user_ban')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_modtool_room_info')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_modtool_room_logs')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_trade_anywhere')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_update_notifications')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_helper_use_guide_tool')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_helper_give_guide_tours')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_helper_judge_chat_reviews')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_floorplan_editor')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_camera')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_ads_background')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_wordquiz')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('acc_room_staff_tags')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_infinite_friends')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('acc_mimic_unredeemed')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_update_youtube_playlists')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('cmd_add_youtube_playlist')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('auto_credits_amount')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('auto_pixels_amount')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('auto_gotw_amount')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('auto_points_amount')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('acc_mention')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_setstate')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_buildheight')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_setrotation')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_sellroom')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_buyroom')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_pay')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_kill')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_hoverboard')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_kiss')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_hug')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_welcome')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_disable_effects')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_brb')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_nuke')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_slime')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_explain')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_closedice')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('acc_closedice_room')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_set')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

            Select::make('cmd_furnidata')
                ->options(['0', '1'])
                ->hideFromIndex(),

            Select::make('kiss_cmd')
                ->options(['0', '1', '2'])
                ->hideFromIndex(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
