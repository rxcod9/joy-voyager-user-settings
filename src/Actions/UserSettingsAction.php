<?php

namespace Joy\VoyagerUserSettings\Actions;

use Illuminate\Http\Request;
use TCG\Voyager\Actions\AbstractAction;

class UserSettingsAction extends AbstractAction
{
    public function getTitle()
    {
        return __('joy-voyager-user-settings::generic.user_settings_btn');
    }

    public function getIcon()
    {
        return 'voyager-settings';
    }

    public function getPolicy()
    {
        return 'browse';
    }

    public function getAttributes()
    {
        return [
            'id'     => 'user_settings_btn',
            'class'  => 'btn btn-sm btn-primary pull-right',
            'target' => '_blank',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.users.user-settings.index', $this->data->getKey());
    }

    public function shouldActionDisplayOnDataType()
    {
        return config('joy-voyager-user-settings.enabled', true) !== false
            && $this->dataType->slug === 'users';
    }

    protected function getSlug(Request $request)
    {
        if (isset($this->slug)) {
            $slug = $this->slug;
        } else {
            $slug = explode('.', $request->route()->getName())[1];
        }

        return $slug;
    }
}
