<?php

namespace Ecoleplus\EcoleplusUi\Tests\Components;

use Ecoleplus\EcoleplusUi\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class FormTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('ecoleplus-ui.defaults.form', [
            'base' => 'space-y-6',
            'group' => 'space-y-2',
            'label' => 'block text-sm font-medium text-gray-700',
            'help' => 'mt-1 text-sm text-gray-500',
            'error' => 'mt-1 text-sm text-red-600',
            'actions' => 'flex items-center justify-end space-x-3 mt-6 pt-6 border-t border-gray-200',
        ]);
    }

    /** @test */
    public function it_can_render_a_basic_form()
    {
        $this->assertComponentRenders(
            '<form method="POST" class="space-y-6"><input type="hidden" name="_token" value=""></form>',
            '<x-ecp-form />'
        );
    }

    /** @test */
    public function it_can_handle_file_uploads()
    {
        $this->assertComponentRenders(
            '<form method="POST" enctype="multipart/form-data" class="space-y-6"><input type="hidden" name="_token" value=""></form>',
            '<x-ecp-form :has-files="true" />'
        );
    }

    /** @test */
    public function it_can_handle_different_methods()
    {
        $this->assertComponentRenders(
            '<form method="POST" class="space-y-6"><input type="hidden" name="_token" value=""><input type="hidden" name="_method" value="PUT"></form>',
            '<x-ecp-form method="PUT" />'
        );

        $this->assertComponentRenders(
            '<form method="GET" class="space-y-6"><input type="hidden" name="_token" value=""></form>',
            '<x-ecp-form method="GET" />'
        );
    }

    /** @test */
    public function it_can_have_custom_attributes()
    {
        $this->assertComponentRenders(
            '<form method="POST" class="space-y-6 custom-class" id="contact-form"><input type="hidden" name="_token" value=""></form>',
            '<x-ecp-form class="custom-class" id="contact-form" />'
        );
    }
}
