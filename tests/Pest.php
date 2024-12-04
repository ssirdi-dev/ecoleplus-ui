<?php

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Pest\Laravel;

uses(TestCase::class)->in(__DIR__);
uses()->group('component'); 

function string_trim(string $string): string
{
    return trim(preg_replace('/\s+/', ' ', $string));
}
