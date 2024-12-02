<?php

namespace Ecoleplus\EcoleplusUi\Tests\Components;

use Ecoleplus\EcoleplusUi\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class ButtonTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Ensure config is loaded for each test
        Config::set('ecoleplus-ui.defaults.button', [
            'base' => 'inline-flex items-center justify-center border rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150',
            'primary' => 'border-transparent text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500',
            'secondary' => 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50 focus:ring-gray-500',
        ]);
    }

    /** @test */
    public function it_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<button type="button" class="inline-flex items-center justify-center border rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-transparent text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500">Click me</button>',
            '<x-ecp-button>Click me</x-ecp-button>'
        );
    }

    /** @test */
    public function it_can_be_rendered_with_different_types()
    {
        $this->assertComponentRenders(
            '<button type="submit" class="inline-flex items-center justify-center border rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-transparent text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500">Submit</button>',
            '<x-ecp-button type="submit">Submit</x-ecp-button>'
        );
    }

    /** @test */
    public function it_applies_variant_classes()
    {
        $this->assertComponentRenders(
            '<button type="button" class="inline-flex items-center justify-center border rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-gray-300 text-gray-700 bg-white hover:bg-gray-50 focus:ring-gray-500">Secondary Button</button>',
            '<x-ecp-button variant="secondary">Secondary Button</x-ecp-button>'
        );
    }

    /** @test */
    public function it_applies_size_classes()
    {
        $this->assertComponentRenders(
            '<button type="button" class="inline-flex items-center justify-center border rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-transparent text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500 px-5 py-2.5 text-lg leading-7">Large Button</button>',
            '<x-ecp-button size="lg">Large Button</x-ecp-button>'
        );
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $this->assertComponentRenders(
            '<button type="button" class="inline-flex items-center justify-center border rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-transparent text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500 opacity-50 cursor-not-allowed" disabled>Disabled Button</button>',
            '<x-ecp-button disabled>Disabled Button</x-ecp-button>'
        );
    }

    /** @test */
    public function it_can_merge_additional_classes()
    {
        $this->assertComponentRenders(
            '<button type="button" class="inline-flex items-center justify-center border rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-transparent text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500 custom-class">With Custom Class</button>',
            '<x-ecp-button class="custom-class">With Custom Class</x-ecp-button>'
        );
    }
}
