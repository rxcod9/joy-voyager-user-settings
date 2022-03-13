<?php

namespace Joy\VoyagerUserSettings\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

trait UpdateAction
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

    public function update($id, Request $request)
    {
        // Check permission
        $this->authorize(
            'edit',
            Voyager::model('UserSetting'),
        );

        Voyager::model('User')->findOrFail($id);

        $settingTypes = Voyager::model('UserSettingType')->get();
        $settings = Voyager::model('UserSetting')->whereUserId($id)->get();

        foreach ($settingTypes as $settingType) {
            $content = $this->getContentBasedOnType($request, 'user_settings', (object) [
                'type'    => $settingType->type,
                'field'   => str_replace('.', '_', $settingType->key),
                'group'   => $settingType->group,
            ], $settingType->details);

            if ($settingType->type == 'image' && $content == null) {
                continue;
            }

            if ($settingType->type == 'file' && $content == null) {
                continue;
            }

            $key = preg_replace('/^' . Str::slug($settingType->group) . './i', '', $settingType->key);

            $settingType->group = $request->input(str_replace('.', '_', $settingType->key) . '_group');
            $settingType->key = implode('.', [Str::slug($settingType->group), $key]);
            // $settingType->value = $content;
            $settingType->save();

            $setting = Voyager::model('UserSetting')->firstOrNew([
                'user_id' => $id,
                'user_setting_type_id' => $settingType->id,
            ]);
            $setting->value = $content;
            $setting->save();
        }

        request()->flashOnly('user_setting_tab');

        return back()->with([
            'message'    => __('voyager::settings.successfully_saved'),
            'alert-type' => 'success',
        ]);
    }
}
