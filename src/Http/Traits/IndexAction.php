<?php

namespace Joy\VoyagerUserSettings\Http\Traits;

use TCG\Voyager\Facades\Voyager;

trait IndexAction
{
    //***************************************
    //               ____
    //              |  _ \
    //              | |_) |
    //              |  _ <
    //              | |_) |
    //              |____/
    //
    //      UserSettings DataTable our Data Type (B)READ
    //
    //****************************************

    public function index($id)
    {
        // Check permission
        $this->authorize(
            'browse',
            Voyager::model('UserSetting'),
        );

        $user = Voyager::model('User')->findOrFail($id);

        $types        = Voyager::model('UserSettingType')->orderBy('order', 'ASC')->get();
        $userSettings = Voyager::model('UserSetting')->whereUserId($id)->get();

        $settingTypes                                        = [];
        $settings                                            = [];
        $settingTypes[__('voyager::settings.group_general')] = [];
        $settings[__('voyager::settings.group_general')]     = [];
        foreach ($types as $d) {
            $s = $userSettings->where('user_setting_type_id', $d->id)->first();
            if ($d->group == '' || $d->group == __('voyager::settings.group_general')) {
                $settingTypes[__('voyager::settings.group_general')][] = $d;
                $settings[__('voyager::settings.group_general')][]     = $s;
            } else {
                $settingTypes[$d->group][] = $d;
                $settings[$d->group][]     = $s;
            }
        }
        if (count($settingTypes[__('voyager::settings.group_general')]) == 0) {
            unset($settingTypes[__('voyager::settings.group_general')]);
        }
        if (count($settings[__('voyager::settings.group_general')]) == 0) {
            unset($settings[__('voyager::settings.group_general')]);
        }

        $groups_data = Voyager::model('UserSettingType')->select('group')->distinct()->get();
        $groups      = [];
        foreach ($groups_data as $group) {
            if ($group->group != '') {
                $groups[] = $group->group;
            }
        }

        $active = (request()->session()->has('user_setting_tab')) ? request()->session()->get('user_setting_tab') : old('user_setting_tab', key($settings));

        return Voyager::view(
            'joy-voyager-user-settings::settings.index',
            compact('settingTypes', 'settings', 'groups', 'active', 'id', 'user')
        );
    }
}
