<?php

namespace Joy\VoyagerUserSettings\Http\Traits;

use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Facades\Voyager;

trait DeleteValueAction
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

    public function delete_value($id, $sid)
    {
        $setting = Voyager::model('UserSetting')->whereUserId((int) $id)->whereUserSettingTypeId((int) $sid)->firstOrFail();

        // Check permission
        $this->authorize(
            'delete',
            $setting,
        );

        $user = Voyager::model('User')->findOrFail($id);

        if (isset($setting->id)) {
            // If the type is an image... Then delete it
            if ($setting->userSettingType->type == 'image') {
                if (Storage::disk(config('voyager.storage.disk'))->exists($setting->value)) {
                    Storage::disk(config('voyager.storage.disk'))->delete($setting->value);
                }
            }
            $setting->value = '';
            $setting->save();
        }

        request()->session()->flash('user_setting_tab', $setting->userSettingType->group);

        return back()->with([
            'message'    => __('voyager::settings.successfully_removed', ['name' => $setting->userSettingType->display_name]),
            'alert-type' => 'success',
        ]);
    }
}
