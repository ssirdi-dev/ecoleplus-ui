<?php

namespace Ecoleplus\EcoleplusUi\Commands;

use Illuminate\Console\Command;

class EcoleplusUiCommand extends Command
{
    public $signature = 'ecoleplus-ui';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
