<?php

namespace Tests\Feature\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Empresa;


class ListEmpresaTest extends TestCase

{

    /** @test */
    public function can_fetch_single_empresa()
    {   
        $visitors = Empresa::truncate();
        $empresa = Empresa::factory()->create();

        $response = $this->getJson(route('empresa.show', $empresa));
        $response->assertJson([
            'data' => [
                'type' => 'empresa',
                'id' => (string) $empresa->getRouteKey(),
                'attributes' => [
                    'ambiente' => $empresa->ambiente,
                    'razon_comercial' => $empresa->razon_comercial,
                    'ruc' => $empresa->ruc,
                ],
                'links' =>[
                    'self' => route('empresa.show', $empresa)
                ]
            ]
        ]);
    }
}
