<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArchivoAPIRequest;
use App\Http\Requests\API\UpdateArchivoAPIRequest;
use App\Models\Archivo;
use App\Repositories\ArchivoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ArchivoController
 * @package App\Http\Controllers\API
 */

class ArchivoAPIController extends AppBaseController
{
    /** @var  ArchivoRepository */
    private $archivoRepository;

    public function __construct(ArchivoRepository $archivoRepo)
    {
        $this->archivoRepository = $archivoRepo;
    }

    /**
     * Display a listing of the Archivo.
     * GET|HEAD /archivos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->archivoRepository->pushCriteria(new RequestCriteria($request));
        $this->archivoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $archivos = $this->archivoRepository->all();

        return $this->sendResponse($archivos->toArray(), 'Archivos retrieved successfully');
    }

    /**
     * Store a newly created Archivo in storage.
     * POST /archivos
     *
     * @param CreateArchivoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateArchivoAPIRequest $request)
    {
        $input = $request->all();

        $archivos = $this->archivoRepository->create($input);

        return $this->sendResponse($archivos->toArray(), 'Archivo saved successfully');
    }

    /**
     * Display the specified Archivo.
     * GET|HEAD /archivos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Archivo $archivo */
        $archivo = $this->archivoRepository->findWithoutFail($id);

        if (empty($archivo)) {
            return $this->sendError('Archivo not found');
        }

        return $this->sendResponse($archivo->toArray(), 'Archivo retrieved successfully');
    }

    /**
     * Update the specified Archivo in storage.
     * PUT/PATCH /archivos/{id}
     *
     * @param  int $id
     * @param UpdateArchivoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArchivoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Archivo $archivo */
        $archivo = $this->archivoRepository->findWithoutFail($id);

        if (empty($archivo)) {
            return $this->sendError('Archivo not found');
        }

        $archivo = $this->archivoRepository->update($input, $id);

        return $this->sendResponse($archivo->toArray(), 'Archivo updated successfully');
    }

    /**
     * Remove the specified Archivo from storage.
     * DELETE /archivos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Archivo $archivo */
        $archivo = $this->archivoRepository->findWithoutFail($id);

        if (empty($archivo)) {
            return $this->sendError('Archivo not found');
        }

        $archivo->delete();

        return $this->sendResponse($id, 'Archivo deleted successfully');
    }
}
