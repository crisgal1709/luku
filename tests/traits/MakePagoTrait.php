<?php

use Faker\Factory as Faker;
use App\Models\Pago;
use App\Repositories\PagoRepository;

trait MakePagoTrait
{
    /**
     * Create fake instance of Pago and save it in database
     *
     * @param array $pagoFields
     * @return Pago
     */
    public function makePago($pagoFields = [])
    {
        /** @var PagoRepository $pagoRepo */
        $pagoRepo = App::make(PagoRepository::class);
        $theme = $this->fakePagoData($pagoFields);
        return $pagoRepo->create($theme);
    }

    /**
     * Get fake instance of Pago
     *
     * @param array $pagoFields
     * @return Pago
     */
    public function fakePago($pagoFields = [])
    {
        return new Pago($this->fakePagoData($pagoFields));
    }

    /**
     * Get fake data of Pago
     *
     * @param array $postFields
     * @return array
     */
    public function fakePagoData($pagoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fecha' => $fake->word,
            'monto' => $fake->word,
            'observaciones' => $fake->text,
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pagoFields);
    }
}
