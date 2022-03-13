<?php

namespace Joy\VoyagerUserSettings\UserSettings;

use Illuminate\Support\Facades\Cache;
use TCG\Voyager\Contracts\User;
use TCG\Voyager\Facades\Voyager;

class UserSettings
{
    public static $setting_cache = null;

    /**
     * Get user setting
     */
    public static function userSetting(User $user, $key, $default = null)
    {
        $globalCache = config('voyager.settings.cache', false);

        if ($globalCache && Cache::tags('user-settings-' . $user->getKey())->has($key)) {
            return Cache::tags('user-settings-' . $user->getKey())->get($key);
        }

        if (self::$setting_cache === null) {
            if ($globalCache) {
                // A key is requested that is not in the cache
                // this is a good opportunity to update all keys
                // albeit not strictly necessary
                Cache::tags('user-settings-' . $user->getKey())->flush();
            }

            $settingTypes = Voyager::model('UserSettingType')->orderBy('order')->get();
            $settings     = Voyager::model('UserSetting')->whereUserId($user->getKey())->get();
            foreach ($settingTypes as $settingType) {
                $setting                                  = $settings->where('user_setting_type_id', $settingType->id)->first();
                $keys                                     = explode('.', $settingType->key);
                @self::$setting_cache[$keys[0]][$keys[1]] = optional($setting)->value ?? null;

                if ($globalCache) {
                    Cache::tags('user-settings-' . $user->getKey())->forever($settingType->key, $settingType->value);
                }
            }
        }

        $parts = explode('.', $key);

        if (count($parts) == 2) {
            return @self::$setting_cache[$parts[0]][$parts[1]] ?: $default;
        } else {
            return @self::$setting_cache[$parts[0]] ?: $default;
        }
    }
}
