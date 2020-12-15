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
        $url = route('empresa.listar', ['sort' => 'razon_comercial']);

        $this->getJson($url)->assertSeeInOrder([
            'A razon',
            'B razon',
            'C razon'
        ]);
    }

    /** @test */
    public function it_cant_sort_articles_by_title_desc()
    {
        $url = route('empresa.listar', ['sort' => '-razon_comercial']);

        $this->getJson($url)->assertSeeInOrder([
            'C razon',
            'B razon',
            'A razon'
        ]);
    }

    /** @test */
    public function it_cant_sort_articles_by_title_and_content_desc()
    {
        $url = route('empresa.listar').'?sort=-razon_comercial,razon_social';

        $this->getJson($url)->assertSeeInOrder([
            'C razon',
            'B razon',
            'A razon'
        ]);
    }

    /** @test */
    public function it_cannot_sort_articles_by_uknow_fields()
    {
        $url = route('empresa.listar').'?sort=unknown';

        $this->getJson($url)->assertStatus(400);
    }
}
