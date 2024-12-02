<?php

namespace Ecoleplus\EcoleplusUi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ecoleplus\EcoleplusUi\EcoleplusUi
 */
class EcoleplusUi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ecoleplus\EcoleplusUi\EcoleplusUi::class;
    }
}
