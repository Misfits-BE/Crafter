<?php

namespace Tests\Feature;

use Tests\TestCase;

class DisclaimerTest extends TestCase
{
    /**
     * @test
     * @testdox Kijk na of degebruiker de disclaimer pagina kan bekijken zonder fouten.
     */
    public function testExample()
    {
        $this->get(route('disclaimer'))->assertStatus(200);
    }
}
