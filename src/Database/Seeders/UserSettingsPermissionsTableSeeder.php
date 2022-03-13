<?php

namespace Joy\VoyagerUserSettings\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class UserSettingsPermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Permission::generateFor('user_settings');
    }
}
