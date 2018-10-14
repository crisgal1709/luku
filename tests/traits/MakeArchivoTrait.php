<?php

use Faker\Factory as Faker;
use App\Models\Archivo;
use App\Repositories\ArchivoRepository;

trait MakeArchivoTrait
{
    /**
     * Create fake instance of Archivo and save it in database
     *
     * @param array $archivoFields
     * @return Archivo
     */
    public function makeArchivo($archivoFields = [])
    {
        /** @var ArchivoRepository $archivoRepo */
        $archivoRepo = App::make(ArchivoRepository::class);
        $theme = $this->fakeArchivoData($archivoFields);
        return $archivoRepo->create($theme);
    }

    /**
     * Get fake instance of Archivo
     *
     * @param array $archivoFields
     * @return Archivo
     */
    public function fakeArchivo($archivoFields = [])
    {
        return new Archivo($this->fakeArchivoData($archivoFields));
    }

    /**
     * Get fake data of Archivo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeArchivoData($archivoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'path' => $fake->word,
            'nombre' => $fake->word,
            'tamanio' => $fake->text,
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $archivoFields);
    }
}
