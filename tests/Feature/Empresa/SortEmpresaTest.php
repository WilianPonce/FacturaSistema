<?php

namespace Tests\Feature\Empresa;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Empresa;

class SortEmpresaTest extends TestCase
{
    /** @test */
    public function it_cant_sort_articles_by_title_asc()
    {
        $visitors = Empresa::truncate();
        Empresa::factory()->create(['razon_comercial' => 'C razon']);
        Empresa::factory()->create(['razon_comercial' => 'B razon']);
        Empresa::factory()->create(['razon_comercial' => 'A razon']);

        $url = route('empresa.index', ['sort' => 'razon_comercial']);

        $this->getJson($url)->assertSeeInOrder([
            'A razon',
            'B razon',
            'C razon'
        ]);
    }

    /** @test */
    public function it_cant_sort_articles_by_title_desc()
    {
        $visitors = Empresa::truncate();
        Empresa::factory()->create(['razon_comercial' => 'C razon']);
        Empresa::factory()->create(['razon_comercial' => 'B razon']);
        Empresa::factory()->create(['razon_comercial' => 'A razon']);

        $url = route('empresa.index', ['sort' => '-razon_comercial']);

        $this->getJson($url)->assertSeeInOrder([
            'C razon',
            'B razon',
            'A razon'
        ]);
    }

    /** @test */
    public function it_cant_sort_articles_by_title_and_content_desc()
    {
        $visitors = Empresa::truncate();
        Empresa::factory()->create([
            'razon_comercial' => 'C razon',
            'razon_social' => 'A social'
        ]);
        Empresa::factory()->create([
            'razon_comercial' => 'B razon',
            'razon_social' => 'C social'
        ]); 
        Empresa::factory()->create([
            'razon_comercial' => 'A razon',
            'razon_social' => 'B social'
        ]);

        $url = route('empresa.index').'?sort=-razon_comercial,razon_social';

        $this->getJson($url)->assertSeeInOrder([
            'C razon',
            'B razon',
            'A razon'
        ]);
    }

    public function it_cannot_sort_articles_by_uknow_fields()
    {
        $visitors = Empresa::truncate();
        $empresa = Empresa::factory()->times(3)->create();

        $url = route('empresa.index').'?sort=unknown';

        $this->getJson($url)->assertStatus(400);
    }
}
