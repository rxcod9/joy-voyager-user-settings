<?php

use Joy\VoyagerUserSettings\UserSettings\UserSettings;
use TCG\Voyager\Contracts\User;

// if (! function_exists('joyVoyagerUserSettings')) {
//     /**
//      * Helper
//      */
//     function joyVoyagerUserSettings($argument1 = null)
//     {
//         //
//     }
// }

if (!function_exists('userSetting')) {
    function userSetting(User $user, $key, $default = null)
    {
        return UserSettings::userSetting($user, $key, $default);
    }
}
