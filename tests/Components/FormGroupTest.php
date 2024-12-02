<?php

namespace Ecoleplus\EcoleplusUi\Tests\Components;

use Ecoleplus\EcoleplusUi\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class FormGroupTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('ecoleplus-ui.defaults.form', [
            'group' => 'space-y-2',
            'label' => 'block text-sm font-medium text-gray-700',
            'help' => 'mt-1 text-sm text-gray-500',
            'error' => 'mt-1 text-sm text-red-600',
        ]);
    }

    /** @test */
    public function it_can_render_a_basic_group()
    {
        $this->assertComponentRenders(
            '<div class="space-y-2">content</div>',
            '<x-ecp-form-group>content</x-ecp-form-group>'
        );
    }

    /** @test */
    public function it_can_have_a_label()
    {
        $this->assertComponentRenders(
            '<div class="space-y-2"><label class="block text-sm font-medium text-gray-700">Name</label>content</div>',
            '<x-ecp-form-group label="Name">content</x-ecp-form-group>'
        );
    }

    /** @test */
    public function it_can_show_help_text()
    {
        $this->assertComponentRenders(
            '<div class="space-y-2">content<p class="mt-1 text-sm text-gray-500">This is help text</p></div>',
            '<x-ecp-form-group help="This is help text">content</x-ecp-form-group>'
        );
    }

    /** @test */
    public function it_can_show_an_error()
    {
        $this->assertComponentRenders(
            '<div class="space-y-2">content<p class="mt-1 text-sm text-red-600">This field is required</p></div>',
            '<x-ecp-form-group error="This field is required">content</x-ecp-form-group>'
        );
    }

    /** @test */
    public function it_prioritizes_error_over_help_text()
    {
        $this->assertComponentRenders(
            '<div class="space-y-2">content<p class="mt-1 text-sm text-red-600">This field is required</p></div>',
            '<x-ecp-form-group help="This is help text" error="This field is required">content</x-ecp-form-group>'
        );
    }

    /** @test */
    public function it_can_have_custom_attributes()
    {
        $this->assertComponentRenders(
            '<div class="space-y-2 custom-class" id="name-group">content</div>',
            '<x-ecp-form-group class="custom-class" id="name-group">content</x-ecp-form-group>'
        );
    }
}
