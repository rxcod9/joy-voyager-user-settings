<?php

namespace Joy\VoyagerUserSettings\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

trait StoreAction
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

    public function store($id, Request $request)
    {
        // Check permission
        $this->authorize(
            'add',
            Voyager::model('UserSetting'),
        );

        $user = Voyager::model('User')->findOrFail($id);

        $key       = implode('.', [Str::slug($request->input('group')), $request->input('key')]);
        $key_check = Voyager::model('UserSettingType')->where('key', $key)->get()->count();

        if ($key_check > 0) {
            return back()->with([
                'message'    => __('voyager::settings.key_already_exists', ['key' => $key]),
                'alert-type' => 'error',
            ]);
        }

        $lastSetting = Voyager::model('UserSettingType')->orderBy('order', 'DESC')->first();

        if (is_null($lastSetting)) {
            $order = 0;
        } else {
            $order = intval($lastSetting->order) + 1;
        }

        $request->merge(['order' => $order]);
        $request->merge(['value' => null]);
        $request->merge(['key' => $key]);

        $userSettingType = Voyager::model('UserSettingType')->create($request->except(['user_setting_tab', 'value']));

        Voyager::model('UserSetting')->create([
            'user_id'              => $id,
            'user_setting_type_id' => $userSettingType->id,
            'value'                => null,
        ]);

        request()->flashOnly('user_setting_tab');

        return back()->with([
            'message'    => __('voyager::settings.successfully_created'),
            'alert-type' => 'success',
        ]);
    }
}
