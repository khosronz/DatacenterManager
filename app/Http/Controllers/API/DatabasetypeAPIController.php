<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDatabasetypeAPIRequest;
use App\Http\Requests\API\UpdateDatabasetypeAPIRequest;
use App\Models\Databasetype;
use App\Repositories\DatabasetypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DatabasetypeController
 * @package App\Http\Controllers\API
 */

class DatabasetypeAPIController extends AppBaseController
{
    /** @var  DatabasetypeRepository */
    private $databasetypeRepository;

    public function __construct(DatabasetypeRepository $databasetypeRepo)
    {
        $this->databasetypeRepository = $databasetypeRepo;
    }

    /**
     * Display a listing of the Databasetype.
     * GET|HEAD /databasetypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $databasetypes = $this->databasetypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($databasetypes->toArray(), 'Databasetypes retrieved successfully');
    }

    /**
     * Store a newly created Databasetype in storage.
     * POST /databasetypes
     *
     * @param CreateDatabasetypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDatabasetypeAPIRequest $request)
    {
        $input = $request->all();

        $databasetypes = $this->databasetypeRepository->create($input);

        return $this->sendResponse($databasetypes->toArray(), 'Databasetype saved successfully');
    }

    /**
     * Display the specified Databasetype.
     * GET|HEAD /databasetypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Databasetype $databasetype */
        $databasetype = $this->databasetypeRepository->find($id);

        if (empty($databasetype)) {
            return $this->sendError('Databasetype not found');
        }

        return $this->sendResponse($databasetype->toArray(), 'Databasetype retrieved successfully');
    }

    /**
     * Update the specified Databasetype in storage.
     * PUT/PATCH /databasetypes/{id}
     *
     * @param int $id
     * @param UpdateDatabasetypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDatabasetypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Databasetype $databasetype */
        $databasetype = $this->databasetypeRepository->find($id);

        if (empty($databasetype)) {
            return $this->sendError('Databasetype not found');
        }

        $databasetype = $this->databasetypeRepository->update($input, $id);

        return $this->sendResponse($databasetype->toArray(), 'Databasetype updated successfully');
    }

    /**
     * Remove the specified Databasetype from storage.
     * DELETE /databasetypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Databasetype $databasetype */
        $databasetype = $this->databasetypeRepository->find($id);

        if (empty($databasetype)) {
            return $this->sendError('Databasetype not found');
        }

        $databasetype->delete();

        return $this->sendResponse($id, 'Databasetype deleted successfully');
    }
}
