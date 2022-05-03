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

        Voyager::model('User')->findOrFail($id);

        $settingType = Voyager::model('UserSettingType')->findOrFail((int) $sid);

        Voyager::model('UserSetting')->whereUserId($id)->whereUserSettingTypeId($sid)->delete();
        Voyager::model('UserSettingType')->destroy($sid);

        request()->session()->flash('user_setting_tab', $settingType->group);

        return back()->with([
            'message'    => __('voyager::settings.successfully_deleted'),
            'alert-type' => 'success',
        ]);
    }
}
