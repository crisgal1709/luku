<?php

use App\Models\Pago;
use App\Repositories\PagoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagoRepositoryTest extends TestCase
{
    use MakePagoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PagoRepository
     */
    protected $pagoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pagoRepo = App::make(PagoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePago()
    {
        $pago = $this->fakePagoData();
        $createdPago = $this->pagoRepo->create($pago);
        $createdPago = $createdPago->toArray();
        $this->assertArrayHasKey('id', $createdPago);
        $this->assertNotNull($createdPago['id'], 'Created Pago must have id specified');
        $this->assertNotNull(Pago::find($createdPago['id']), 'Pago with given id must be in DB');
        $this->assertModelData($pago, $createdPago);
    }

    /**
     * @test read
     */
    public function testReadPago()
    {
        $pago = $this->makePago();
        $dbPago = $this->pagoRepo->find($pago->id);
        $dbPago = $dbPago->toArray();
        $this->assertModelData($pago->toArray(), $dbPago);
    }

    /**
     * @test update
     */
    public function testUpdatePago()
    {
        $pago = $this->makePago();
        $fakePago = $this->fakePagoData();
        $updatedPago = $this->pagoRepo->update($fakePago, $pago->id);
        $this->assertModelData($fakePago, $updatedPago->toArray());
        $dbPago = $this->pagoRepo->find($pago->id);
        $this->assertModelData($fakePago, $dbPago->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePago()
    {
        $pago = $this->makePago();
        $resp = $this->pagoRepo->delete($pago->id);
        $this->assertTrue($resp);
        $this->assertNull(Pago::find($pago->id), 'Pago should not exist in DB');
    }
}
