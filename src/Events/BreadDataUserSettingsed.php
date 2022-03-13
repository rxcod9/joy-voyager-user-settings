<?php

namespace Joy\VoyagerUserSettings\Events;

use Illuminate\Queue\SerializesModels;
use TCG\Voyager\Models\DataType;

class BreadDataUserSettingsed
{
    use SerializesModels;

    public $dataType;

    public $data;

    public function __construct(DataType $dataType, $data)
    {
        $this->dataType = $dataType;

        $this->data = $data;

        // event(new BreadDataChanged($dataType, $data, 'UserSettingsed'));
    }
}
