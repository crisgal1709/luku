<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArchivoApiTest extends TestCase
{
    use MakeArchivoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateArchivo()
    {
        $archivo = $this->fakeArchivoData();
        $this->json('POST', '/api/v1/archivos', $archivo);

        $this->assertApiResponse($archivo);
    }

    /**
     * @test
     */
    public function testReadArchivo()
    {
        $archivo = $this->makeArchivo();
        $this->json('GET', '/api/v1/archivos/'.$archivo->id);

        $this->assertApiResponse($archivo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateArchivo()
    {
        $archivo = $this->makeArchivo();
        $editedArchivo = $this->fakeArchivoData();

        $this->json('PUT', '/api/v1/archivos/'.$archivo->id, $editedArchivo);

        $this->assertApiResponse($editedArchivo);
    }

    /**
     * @test
     */
    public function testDeleteArchivo()
    {
        $archivo = $this->makeArchivo();
        $this->json('DELETE', '/api/v1/archivos/'.$archivo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/archivos/'.$archivo->id);

        $this->assertResponseStatus(404);
    }
}
