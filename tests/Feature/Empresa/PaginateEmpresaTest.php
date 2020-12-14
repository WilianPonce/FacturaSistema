<?php

namespace Tests\Feature\Empresa;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Empresa;

class PaginateEmpresaTest extends TestCase
{
    /** @test */
    public function paginate()
    {
        $visitors = Empresa::truncate();
        $empresa = Empresa::factory()->times(10)->create();

        $url = route('empresa.index', ['page[size]' => 2, 'page[number]' => 3]);

        $response = $this->getJson($url);

        $response->assertJsonCount(2, 'data')
            ->assertSee($empresa[4]->razon_comercial) 
            ->assertSee($empresa[5]->razon_comercial)    
        ;
        
        $response->assertJsonStructure([
            'links' => ['first', 'last', 'prev', 'next']
        ]);

        $response->assertJsonFragment([
            'first' => route('empresa.index', ['page[size]' => 2, 'page[number]' => 1]),
            'last' => route('empresa.index', ['page[size]' => 2, 'page[number]' => 5]),
            'prev' => route('empresa.index', ['page[size]' => 2, 'page[number]' => 2]),
            'next' => route('empresa.index', ['page[size]' => 2, 'page[number]' => 4])
        ]);
    }
}
