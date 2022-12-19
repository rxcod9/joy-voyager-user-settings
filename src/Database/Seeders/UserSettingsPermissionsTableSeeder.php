<?php

namespace Joy\VoyagerUserSettings\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Facades\Voyager;

class UserSettingsPermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Voyager::model('Permission')->generateFor('user_settings');
    }
}
