<?php

namespace Joy\VoyagerUserSettings\Http\Traits;

use TCG\Voyager\Facades\Voyager;

trait DeleteAction
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

    public function delete($id, $sid)
    {
        // Check permission
        $this->authorize(
            'delete',
            Voyager::model('UserSetting'),
        );

        $user = Voyager::model('User')->findOrFail($id);

        $setting = Voyager::model('UserSetting')->whereUserId((int) $id)->whereUserSettingTypeId((int) $sid)->firstOrFail();

        Voyager::model('UserSetting')->whereUserId($id)->destroy($sid);

        request()->session()->flash('user_setting_tab', $setting->userSettingType->group);

        return back()->with([
            'message'    => __('voyager::settings.successfully_deleted'),
            'alert-type' => 'success',
        ]);
    }
}
