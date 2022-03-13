<?php

namespace Joy\VoyagerUserSettings\Http\Controllers;

use Joy\VoyagerUserSettings\Http\Traits\UserSettingsAction;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as TCGVoyagerBaseController;

class VoyagerBaseController extends TCGVoyagerBaseController
{
    use UserSettingsAction;
}
