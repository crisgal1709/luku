<?php

use App\Models\Archivo;
use App\Repositories\ArchivoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArchivoRepositoryTest extends TestCase
{
    use MakeArchivoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ArchivoRepository
     */
    protected $archivoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->archivoRepo = App::make(ArchivoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateArchivo()
    {
        $archivo = $this->fakeArchivoData();
        $createdArchivo = $this->archivoRepo->create($archivo);
        $createdArchivo = $createdArchivo->toArray();
        $this->assertArrayHasKey('id', $createdArchivo);
        $this->assertNotNull($createdArchivo['id'], 'Created Archivo must have id specified');
        $this->assertNotNull(Archivo::find($createdArchivo['id']), 'Archivo with given id must be in DB');
        $this->assertModelData($archivo, $createdArchivo);
    }

    /**
     * @test read
     */
    public function testReadArchivo()
    {
        $archivo = $this->makeArchivo();
        $dbArchivo = $this->archivoRepo->find($archivo->id);
        $dbArchivo = $dbArchivo->toArray();
        $this->assertModelData($archivo->toArray(), $dbArchivo);
    }

    /**
     * @test update
     */
    public function testUpdateArchivo()
    {
        $archivo = $this->makeArchivo();
        $fakeArchivo = $this->fakeArchivoData();
        $updatedArchivo = $this->archivoRepo->update($fakeArchivo, $archivo->id);
        $this->assertModelData($fakeArchivo, $updatedArchivo->toArray());
        $dbArchivo = $this->archivoRepo->find($archivo->id);
        $this->assertModelData($fakeArchivo, $dbArchivo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteArchivo()
    {
        $archivo = $this->makeArchivo();
        $resp = $this->archivoRepo->delete($archivo->id);
        $this->assertTrue($resp);
        $this->assertNull(Archivo::find($archivo->id), 'Archivo should not exist in DB');
    }
}
