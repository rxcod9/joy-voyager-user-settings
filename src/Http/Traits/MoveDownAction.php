<?php

namespace Joy\VoyagerUserSettings\Http\Traits;

use TCG\Voyager\Facades\Voyager;

trait MoveDownAction
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

    public function move_down($id, $sid)
    {
        // Check permission
        $this->authorize(
            'edit',
            Voyager::model('UserSetting'),
        );

        $user = Voyager::model('User')->findOrFail($id);

        $setting     = Voyager::model('UserSetting')->whereUserId((int) $id)->whereUserSettingTypeId((int) $sid)->firstOrFail();
        $settingType = $setting->userSettingType;

        // Check permission
        $this->authorize(
            'browse',
            $setting,
        );

        $swapOrder = $settingType->order;

        $previousSettingType = Voyager::model('UserSettingType')
            ->where('order', '>', $swapOrder)
            ->where('group', $settingType->group)
            ->orderBy('order', 'ASC')->first();
        $data = [
            'message'    => __('voyager::settings.already_at_bottom'),
            'alert-type' => 'error',
        ];

        if (isset($previousSettingType->order)) {
            $settingType->order = $previousSettingType->order;
            $settingType->save();
            $previousSettingType->order = $swapOrder;
            $previousSettingType->save();

            $data = [
                'message'    => __('voyager::settings.moved_order_down', ['name' => $setting->display_name]),
                'alert-type' => 'success',
            ];
        }

        request()->session()->flash('user_setting_tab', $settingType->group);

        return back()->with($data);
    }
}
