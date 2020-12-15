<?php

namespace Tests\Feature\Empresa;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Empresa;

class FilterEmpresaTest extends TestCase
{
    /** @test */
    public function testExample()
    {
        $url = route('empresa.listar', ['filter[direccion]' =>'Quito']);
        $this->getJson($url)
            ->assertJsonCount(1, 'data')
            ->assertSee('Quito')
            ->assertDontSee('Guayaquil');
    }
}
