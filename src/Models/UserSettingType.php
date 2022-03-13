<?php

namespace Joy\VoyagerUserSettings\Models;

use Illuminate\Database\Eloquent\Model;

class UserSettingType extends Model
{
    protected $table = 'user_setting_types';

    protected $guarded = [];

    public $timestamps = false;
}
