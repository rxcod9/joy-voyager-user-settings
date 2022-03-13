<?php

namespace Joy\VoyagerUserSettings\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

trait MoveUpAction
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

    public function move_up($id, $sid)
    {
        // Check permission
        $this->authorize(
            'edit',
            Voyager::model('UserSetting'),
        );

        $user = Voyager::model('User')->findOrFail($id);

        $setting = Voyager::model('UserSetting')->whereUserId((int) $id)->whereUserSettingTypeId((int) $sid)->firstOrFail();
        $settingType = $setting->userSettingType;

        // Check permission
        $this->authorize(
            'browse',
            $setting,
        );

        $swapOrder = $settingType->order;
        $previousSettingType = Voyager::model('UserSettingType')
            ->where('order', '<', $swapOrder)
            ->where('group', $setting->userSettingType->group)
            ->orderBy('order', 'DESC')->first();
        $data = [
            'message'    => __('voyager::settings.already_at_top'),
            'alert-type' => 'error',
        ];

        if (isset($previousSettingType->order)) {
            $settingType->order = $previousSettingType->order;
            $settingType->save();
            $previousSettingType->order = $swapOrder;
            $previousSettingType->save();

            $data = [
                'message'    => __('voyager::settings.moved_order_up', ['name' => $settingType->display_name]),
                'alert-type' => 'success',
            ];
        }

        request()->session()->flash('user_setting_tab', $settingType->group);

        return back()->with($data);
    }
}
