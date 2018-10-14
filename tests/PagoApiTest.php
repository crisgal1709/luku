<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagoApiTest extends TestCase
{
    use MakePagoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePago()
    {
        $pago = $this->fakePagoData();
        $this->json('POST', '/api/v1/pagos', $pago);

        $this->assertApiResponse($pago);
    }

    /**
     * @test
     */
    public function testReadPago()
    {
        $pago = $this->makePago();
        $this->json('GET', '/api/v1/pagos/'.$pago->id);

        $this->assertApiResponse($pago->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePago()
    {
        $pago = $this->makePago();
        $editedPago = $this->fakePagoData();

        $this->json('PUT', '/api/v1/pagos/'.$pago->id, $editedPago);

        $this->assertApiResponse($editedPago);
    }

    /**
     * @test
     */
    public function testDeletePago()
    {
        $pago = $this->makePago();
        $this->json('DELETE', '/api/v1/pagos/'.$pago->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pagos/'.$pago->id);

        $this->assertResponseStatus(404);
    }
}
