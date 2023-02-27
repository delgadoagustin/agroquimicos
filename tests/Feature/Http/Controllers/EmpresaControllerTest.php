<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmpresaController
 */
class EmpresaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $empresas = Empresa::factory()->count(3)->create();

        $response = $this->get(route('empresa.index'));

        $response->assertOk();
        $response->assertViewIs('empresa.index');
        $response->assertViewHas('empresas');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('empresa.create'));

        $response->assertOk();
        $response->assertViewIs('empresa.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmpresaController::class,
            'store',
            \App\Http\Requests\EmpresaStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $tipo = $this->faker->randomElement(/** enum_attributes **/);
        $nombre = $this->faker->word;
        $cuit = $this->faker->word;
        $domicilio_empresa = $this->faker->word;
        $telefono_empresa = $this->faker->word;
        $titular = $this->faker->word;
        $dni_titular = $this->faker->word;
        $asesor = $this->faker->word;
        $matricula = $this->faker->word;
        $domicilio_asesor = $this->faker->word;
        $dni_asesor = $this->faker->word;
        $telefono_asesor = $this->faker->word;

        $response = $this->post(route('empresa.store'), [
            'tipo' => $tipo,
            'nombre' => $nombre,
            'cuit' => $cuit,
            'domicilio_empresa' => $domicilio_empresa,
            'telefono_empresa' => $telefono_empresa,
            'titular' => $titular,
            'dni_titular' => $dni_titular,
            'asesor' => $asesor,
            'matricula' => $matricula,
            'domicilio_asesor' => $domicilio_asesor,
            'dni_asesor' => $dni_asesor,
            'telefono_asesor' => $telefono_asesor,
        ]);

        $empresas = Empresa::query()
            ->where('tipo', $tipo)
            ->where('nombre', $nombre)
            ->where('cuit', $cuit)
            ->where('domicilio_empresa', $domicilio_empresa)
            ->where('telefono_empresa', $telefono_empresa)
            ->where('titular', $titular)
            ->where('dni_titular', $dni_titular)
            ->where('asesor', $asesor)
            ->where('matricula', $matricula)
            ->where('domicilio_asesor', $domicilio_asesor)
            ->where('dni_asesor', $dni_asesor)
            ->where('telefono_asesor', $telefono_asesor)
            ->get();
        $this->assertCount(1, $empresas);
        $empresa = $empresas->first();

        $response->assertRedirect(route('empresa.index'));
        $response->assertSessionHas('empresa.id', $empresa->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->get(route('empresa.show', $empresa));

        $response->assertOk();
        $response->assertViewIs('empresa.show');
        $response->assertViewHas('empresa');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->get(route('empresa.edit', $empresa));

        $response->assertOk();
        $response->assertViewIs('empresa.edit');
        $response->assertViewHas('empresa');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmpresaController::class,
            'update',
            \App\Http\Requests\EmpresaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $empresa = Empresa::factory()->create();
        $tipo = $this->faker->randomElement(/** enum_attributes **/);
        $nombre = $this->faker->word;
        $cuit = $this->faker->word;
        $domicilio_empresa = $this->faker->word;
        $telefono_empresa = $this->faker->word;
        $titular = $this->faker->word;
        $dni_titular = $this->faker->word;
        $asesor = $this->faker->word;
        $matricula = $this->faker->word;
        $domicilio_asesor = $this->faker->word;
        $dni_asesor = $this->faker->word;
        $telefono_asesor = $this->faker->word;

        $response = $this->put(route('empresa.update', $empresa), [
            'tipo' => $tipo,
            'nombre' => $nombre,
            'cuit' => $cuit,
            'domicilio_empresa' => $domicilio_empresa,
            'telefono_empresa' => $telefono_empresa,
            'titular' => $titular,
            'dni_titular' => $dni_titular,
            'asesor' => $asesor,
            'matricula' => $matricula,
            'domicilio_asesor' => $domicilio_asesor,
            'dni_asesor' => $dni_asesor,
            'telefono_asesor' => $telefono_asesor,
        ]);

        $empresa->refresh();

        $response->assertRedirect(route('empresa.index'));
        $response->assertSessionHas('empresa.id', $empresa->id);

        $this->assertEquals($tipo, $empresa->tipo);
        $this->assertEquals($nombre, $empresa->nombre);
        $this->assertEquals($cuit, $empresa->cuit);
        $this->assertEquals($domicilio_empresa, $empresa->domicilio_empresa);
        $this->assertEquals($telefono_empresa, $empresa->telefono_empresa);
        $this->assertEquals($titular, $empresa->titular);
        $this->assertEquals($dni_titular, $empresa->dni_titular);
        $this->assertEquals($asesor, $empresa->asesor);
        $this->assertEquals($matricula, $empresa->matricula);
        $this->assertEquals($domicilio_asesor, $empresa->domicilio_asesor);
        $this->assertEquals($dni_asesor, $empresa->dni_asesor);
        $this->assertEquals($telefono_asesor, $empresa->telefono_asesor);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->delete(route('empresa.destroy', $empresa));

        $response->assertRedirect(route('empresa.index'));

        $this->assertModelMissing($empresa);
    }
}
