<?php

namespace Joy\VoyagerUserSettings\Database\Seeders;

use Illuminate\Database\Seeder;
use Joy\VoyagerUserSettings\Models\UserSetting;
use Joy\VoyagerUserSettings\Models\UserSettingType;
use TCG\Voyager\Facades\Voyager;

class UserSettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $setting = $this->findSettingType('locale.timezone');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-user-settings::seeders.settings.timezone'),
                'type'         => 'select_dropdown',
                'order'        => 1,
                'group'        => 'Locale',
                'details'      => json_encode([
                    'default' => null,
                    'options' => [
                        null       => "Select Timezone",
                        'Pacific/Midway'       => "(GMT-11:00) Midway Island",
                        'US/Samoa'             => "(GMT-11:00) Samoa",
                        'US/Hawaii'            => "(GMT-10:00) Hawaii",
                        'US/Alaska'            => "(GMT-09:00) Alaska",
                        'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
                        'America/Tijuana'      => "(GMT-08:00) Tijuana",
                        'US/Arizona'           => "(GMT-07:00) Arizona",
                        'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
                        'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
                        'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
                        'America/Mexico_City'  => "(GMT-06:00) Mexico City",
                        'America/Monterrey'    => "(GMT-06:00) Monterrey",
                        'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
                        'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
                        'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
                        'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
                        'America/Bogota'       => "(GMT-05:00) Bogota",
                        'America/Lima'         => "(GMT-05:00) Lima",
                        'America/Caracas'      => "(GMT-04:30) Caracas",
                        'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
                        'America/La_Paz'       => "(GMT-04:00) La Paz",
                        'America/Santiago'     => "(GMT-04:00) Santiago",
                        'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
                        'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
                        'Greenland'            => "(GMT-03:00) Greenland",
                        'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
                        'Atlantic/Azores'      => "(GMT-01:00) Azores",
                        'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
                        'Africa/Casablanca'    => "(GMT) Casablanca",
                        'Europe/Dublin'        => "(GMT) Dublin",
                        'Europe/Lisbon'        => "(GMT) Lisbon",
                        'Europe/London'        => "(GMT) London",
                        'Africa/Monrovia'      => "(GMT) Monrovia",
                        'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
                        'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
                        'Europe/Berlin'        => "(GMT+01:00) Berlin",
                        'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
                        'Europe/Brussels'      => "(GMT+01:00) Brussels",
                        'Europe/Budapest'      => "(GMT+01:00) Budapest",
                        'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
                        'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
                        'Europe/Madrid'        => "(GMT+01:00) Madrid",
                        'Europe/Paris'         => "(GMT+01:00) Paris",
                        'Europe/Prague'        => "(GMT+01:00) Prague",
                        'Europe/Rome'          => "(GMT+01:00) Rome",
                        'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
                        'Europe/Skopje'        => "(GMT+01:00) Skopje",
                        'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
                        'Europe/Vienna'        => "(GMT+01:00) Vienna",
                        'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
                        'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
                        'Europe/Athens'        => "(GMT+02:00) Athens",
                        'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
                        'Africa/Cairo'         => "(GMT+02:00) Cairo",
                        'Africa/Harare'        => "(GMT+02:00) Harare",
                        'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
                        'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
                        'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
                        'Europe/Kiev'          => "(GMT+02:00) Kyiv",
                        'Europe/Minsk'         => "(GMT+02:00) Minsk",
                        'Europe/Riga'          => "(GMT+02:00) Riga",
                        'Europe/Sofia'         => "(GMT+02:00) Sofia",
                        'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
                        'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
                        'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
                        'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
                        'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
                        'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
                        'Europe/Moscow'        => "(GMT+03:00) Moscow",
                        'Asia/Tehran'          => "(GMT+03:30) Tehran",
                        'Asia/Baku'            => "(GMT+04:00) Baku",
                        'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
                        'Asia/Muscat'          => "(GMT+04:00) Muscat",
                        'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
                        'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
                        'Asia/Kabul'           => "(GMT+04:30) Kabul",
                        'Asia/Karachi'         => "(GMT+05:00) Karachi",
                        'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
                        'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
                        'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
                        'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
                        'Asia/Almaty'          => "(GMT+06:00) Almaty",
                        'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
                        'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
                        'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
                        'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
                        'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
                        'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
                        'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
                        'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
                        'Australia/Perth'      => "(GMT+08:00) Perth",
                        'Asia/Singapore'       => "(GMT+08:00) Singapore",
                        'Asia/Taipei'          => "(GMT+08:00) Taipei",
                        'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
                        'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
                        'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
                        'Asia/Seoul'           => "(GMT+09:00) Seoul",
                        'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
                        'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
                        'Australia/Darwin'     => "(GMT+09:30) Darwin",
                        'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
                        'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
                        'Australia/Canberra'   => "(GMT+10:00) Canberra",
                        'Pacific/Guam'         => "(GMT+10:00) Guam",
                        'Australia/Hobart'     => "(GMT+10:00) Hobart",
                        'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
                        'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
                        'Australia/Sydney'     => "(GMT+10:00) Sydney",
                        'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
                        'Asia/Magadan'         => "(GMT+12:00) Magadan",
                        'Pacific/Auckland'     => "(GMT+12:00) Auckland",
                        'Pacific/Fiji'         => "(GMT+12:00) Fiji",
                    ],
                ]),
            ])->save();
        }

        $setting = $this->findSettingType('locale.language');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-user-settings::seeders.settings.language'),
                'type'         => 'select_dropdown',
                'order'        => 2,
                'group'        => 'Locale',
                'details'      => json_encode([
                    'default' => null,
                    'options' => array_merge(
                        [
                            null       => "Select Language",
                        ],
                        array_combine(
                            Voyager::getLocales(),
                            Voyager::getLocales()
                        ),
                    ),
                ]),
            ])->save();
        }

        $setting = $this->findSettingType('locale.datetime_format');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-user-settings::seeders.settings.datetime_format'),
                'type'         => 'select_dropdown',
                'order'        => 3,
                'group'        => 'Locale',
                'details'      => json_encode([
                    'default' => null,
                    'options' => [
                        null => 'Select datetime format',
                        "F j, Y, g:i a" => "F j, Y, g:i a [" . date("F j, Y, g:i a") . ']',
                        "m.d.y" => "m.d.y [" . date("m.d.y") . ']',
                        "j, n, Y" => "j, n, Y [" . date("j, n, Y") . ']',
                        "Ymd" => "Ymd [" . date("Ymd") . ']',
                        'h-i-s, j-m-y, it is w Day' => 'h-i-s, j-m-y, it is w Day [' . date('h-i-s, j-m-y, it is w Day') . ']',
                        '\i\t \i\s \t\h\e jS \d\a\y.' => '\i\t \i\s \t\h\e jS \d\a\y. [' . date('\i\t \i\s \t\h\e jS \d\a\y.') . ']',
                        "D M j G:i:s T Y" => "D M j G:i:s T Y [" . date("D M j G:i:s T Y") . ']',
                        "H:i:s" => "H:i:s [" . date("H:i:s") . ']',
                        "Y-m-d H:i:s" => "Y-m-d H:i:s [" . date("Y-m-d H:i:s") . ']',
                    ],
                ]),
            ])->save();
        }

        $setting = $this->findSettingType('locale.date_format');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-user-settings::seeders.settings.date_format'),
                'type'         => 'select_dropdown',
                'order'        => 4,
                'group'        => 'Locale',
                'details'      => json_encode([
                    'default' => null,
                    'options' => [
                        null => 'Select date format',
                        "F j, Y" => "F j, Y [" . date("F j, Y") . ']',
                        "m.d.y" => "m.d.y [" . date("m.d.y") . ']',
                        "j, n, Y" => "j, n, Y [" . date("j, n, Y") . ']',
                        "Ymd" => "Ymd [" . date("Ymd") . ']',
                        // 'h-i-s, j-m-y, it is w Day' => 'h-i-s, j-m-y, it is w Day [' . date('h-i-s, j-m-y, it is w Day') . ']',
                        // '\i\t \i\s \t\h\e jS \d\a\y.' => '\i\t \i\s \t\h\e jS \d\a\y. [' . date('\i\t \i\s \t\h\e jS \d\a\y.') . ']',
                        "D M j T Y" => "D M j T Y [" . date("D M j T Y") . ']',
                        // "H:i:s" => "H:i:s [" . date("H:i:s") . ']',
                        "Y-m-d" => "Y-m-d [" . date("Y-m-d") . ']',
                    ],
                ]),
            ])->save();
        }

        $setting = $this->findSettingType('theme.primary_color');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-user-settings::seeders.settings.primary_color'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 5,
                'group'        => 'Theme',
            ])->save();
        }

        $setting = $this->findSettingType('theme.secondary_color');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-user-settings::seeders.settings.secondary_color'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 6,
                'group'        => 'Theme',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSettingType($key)
    {
        return UserSettingType::firstOrNew(['key' => $key]);
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return UserSetting::firstOrNew(['key' => $key]);
    }
}
