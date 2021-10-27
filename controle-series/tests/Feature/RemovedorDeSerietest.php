<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemovedorDeSerietest extends TestCase
{
    use RefreshDatabase;
     /** @var serie */
    private $serie;
    protected function setup() : void 
    {
        parent::setup(); 
        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadordeserie->criarSerie('Nome da serie',1,1);
    }    
    public function testRemoverUmaSerie()
{
    $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
    $removedorDeSerie = new RemovedorDeSerie();
    $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);
    $this->assertIsString($nomeSerie);
    $this->assertEquals('Nome da série', $this->serie->nome);
    $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);

}
}
