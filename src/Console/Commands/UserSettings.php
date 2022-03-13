<?php

namespace Joy\VoyagerUserSettings\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class UserSettings extends Command
{
    protected $name = 'joy-user-settings';

    protected $description = 'Joy Voyager UserSettingser';

    public function handle()
    {
        $this->output->title('Starting user-settings');

        // Your magic here

        $this->output->success('UserSettings successful');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['arguement1', InputArgument::REQUIRED, 'The argument1 description'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            [
                'option1',
                'o',
                InputOption::VALUE_OPTIONAL,
                'The option1 description',
                config('joy-voyager-user-settings.option1')
            ],
        ];
    }
}
