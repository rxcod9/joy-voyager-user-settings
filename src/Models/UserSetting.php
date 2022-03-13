<?php

namespace Joy\VoyagerUserSettings\Models;

use Illuminate\Database\Eloquent\Model;
use Joy\VoyagerUserSettings\Events\UserSettingUpdated;
use TCG\Voyager\Facades\Voyager;

class UserSetting extends Model
{
    protected $table = 'user_settings';

    protected $guarded = [];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'updating' => UserSettingUpdated::class,
    ];

    public function userSettingType()
    {
        return $this->belongsTo(Voyager::modelClass('UserSettingType'));
    }
}
