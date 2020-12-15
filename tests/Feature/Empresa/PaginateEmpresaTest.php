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
        $empresa = Empresa::all();
        $url = route('empresa.listar', ['page[size]' => 2, 'page[number]' => 3]);

        $response = $this->getJson($url);

        $response->assertJsonCount(2, 'data')
            ->assertSee($empresa[4]->razon_comercial) 
            ->assertSee($empresa[5]->razon_comercial);
        
        $response->assertJsonStructure([
            'links' => ['first', 'last', 'prev', 'next']
        ]);

        /*$response->assertJsonFragment([
            'first' => route('empresa.listar', ['page[size]' => 2, 'page[number]' => 1]),
            'last' => route('empresa.listar', ['page[size]' => 2, 'page[number]' => 8]),
            'prev' => route('empresa.listar', ['page[size]' => 2, 'page[number]' => 2]),
            'next' => route('empresa.listar', ['page[size]' => 2, 'page[number]' => 4])
        ]);*/
    }
}
