<?php

namespace Joy\VoyagerUserSettings\Events;

use Illuminate\Queue\SerializesModels;
use Joy\VoyagerUserSettings\Models\UserSetting;

class UserSettingUpdated
{
    use SerializesModels;

    public $userSetting;

    public function __construct(UserSetting $userSetting)
    {
        $this->userSetting = $userSetting;
    }
}
