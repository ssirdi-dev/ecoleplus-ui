<?php

namespace Ecoleplus\EcoleplusUi\Tests\Components;

use Ecoleplus\EcoleplusUi\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class InputTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('ecoleplus-ui.defaults.input', [
            'base' => 'block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm',
            'error' => 'border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500',
            'disabled' => 'bg-gray-100 cursor-not-allowed',
            'label' => 'block text-sm font-medium text-gray-700 mb-1',
            'help' => 'mt-1 text-sm text-gray-500',
            'error-text' => 'mt-1 text-sm text-red-600',
            'prefix' => 'absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none',
            'suffix' => 'absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none',
            'wrapper' => 'relative rounded-md shadow-sm',
        ]);
    }

    /** @test */
    public function it_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<input type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">',
            '<x-ecp-input />'
        );
    }

    /** @test */
    public function it_can_have_a_label()
    {
        $this->assertComponentRenders(
            '<div><label class="block text-sm font-medium text-gray-700 mb-1">Email</label><input type="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm"></div>',
            '<x-ecp-input type="email" label="Email" />'
        );
    }

    /** @test */
    public function it_can_show_an_error()
    {
        $this->assertComponentRenders(
            '<div><input type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500"><p class="mt-1 text-sm text-red-600">Invalid input</p></div>',
            '<x-ecp-input error="Invalid input" />'
        );
    }

    /** @test */
    public function it_can_show_help_text()
    {
        $this->assertComponentRenders(
            '<div><input type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm"><p class="mt-1 text-sm text-gray-500">This is help text</p></div>',
            '<x-ecp-input help="This is help text" />'
        );
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $this->assertComponentRenders(
            '<input type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm bg-gray-100 cursor-not-allowed" disabled>',
            '<x-ecp-input disabled />'
        );
    }

    /** @test */
    public function it_can_have_a_prefix()
    {
        $this->assertComponentRenders(
            '<div><div class="relative rounded-md shadow-sm"><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">$</div><input type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm pl-10"></div></div>',
            '<x-ecp-input prefix="$" />'
        );
    }

    /** @test */
    public function it_can_have_a_suffix()
    {
        $this->assertComponentRenders(
            '<div><div class="relative rounded-md shadow-sm"><input type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm pr-10"><div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">.00</div></div></div>',
            '<x-ecp-input suffix=".00" />'
        );
    }

    /** @test */
    public function it_can_have_custom_attributes()
    {
        $this->assertComponentRenders(
            '<input type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm custom-class" placeholder="Enter text" required>',
            '<x-ecp-input class="custom-class" placeholder="Enter text" required />'
        );
    }
}
