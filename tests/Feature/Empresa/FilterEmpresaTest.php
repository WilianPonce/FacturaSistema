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
        $visitors = Empresa::truncate();
        Empresa::factory()->create([
            'direccion' => 'Guayaquil'
        ]);
        Empresa::factory()->create([
            'direccion' => 'Quito'
        ]);

        $url = route('empresa.index', ['filter[direccion]' =>'Quito']);
        $this->getJson($url)
            ->assertJsonCount(1, 'data')
            ->assertSee('Quito')
            ->assertDontSee('Guayaquil');
    }
}
