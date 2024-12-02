<?php

namespace Ecoleplus\EcoleplusUi\Tests\Components;

use Ecoleplus\EcoleplusUi\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class SelectTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('ecoleplus-ui.defaults.select', [
            'base' => 'block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm',
            'error' => 'border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500',
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
            '<select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"></select>',
            '<x-ecp-select />'
        );
    }

    /** @test */
    public function it_can_render_options()
    {
        $options = [
            '1' => 'Option 1',
            '2' => 'Option 2',
        ];

        $this->assertComponentRenders(
            '<select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"><option value="1">Option 1</option><option value="2">Option 2</option></select>',
            '<x-ecp-select :options="$options" />',
            ['options' => $options]
        );
    }

    /** @test */
    public function it_can_have_a_selected_value()
    {
        $options = [
            '1' => 'Option 1',
            '2' => 'Option 2',
        ];

        $this->assertComponentRenders(
            '<select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"><option value="1">Option 1</option><option value="2" selected>Option 2</option></select>',
            '<x-ecp-select :options="$options" :selected="2" />',
            ['options' => $options]
        );
    }

    /** @test */
    public function it_can_have_a_label()
    {
        $this->assertComponentRenders(
            '<div><label class="block text-sm font-medium text-gray-700 mb-1">Select an option</label><select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"></select></div>',
            '<x-ecp-select label="Select an option" />'
        );
    }

    /** @test */
    public function it_can_show_an_error()
    {
        $this->assertComponentRenders(
            '<div><select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500"></select><p class="mt-1 text-sm text-red-600">Please select an option</p></div>',
            '<x-ecp-select error="Please select an option" />'
        );
    }

    /** @test */
    public function it_can_show_help_text()
    {
        $this->assertComponentRenders(
            '<div><select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"></select><p class="mt-1 text-sm text-gray-500">This is help text</p></div>',
            '<x-ecp-select help="This is help text" />'
        );
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $this->assertComponentRenders(
            '<select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm bg-gray-100 cursor-not-allowed" disabled></select>',
            '<x-ecp-select disabled />'
        );
    }

    /** @test */
    public function it_can_have_a_prefix()
    {
        $this->assertComponentRenders(
            '<div><div class="relative rounded-md shadow-sm"><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">🔍</div><select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm pl-10"></select></div></div>',
            '<x-ecp-select prefix="🔍" />'
        );
    }

    /** @test */
    public function it_can_have_a_suffix()
    {
        $this->assertComponentRenders(
            '<div><div class="relative rounded-md shadow-sm"><select class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm pr-10"></select><div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">▼</div></div></div>',
            '<x-ecp-select suffix="▼" />'
        );
    }
}
