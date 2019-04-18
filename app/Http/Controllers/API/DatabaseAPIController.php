<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDatabaseAPIRequest;
use App\Http\Requests\API\UpdateDatabaseAPIRequest;
use App\Models\Database;
use App\Repositories\DatabaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DatabaseController
 * @package App\Http\Controllers\API
 */

class DatabaseAPIController extends AppBaseController
{
    /** @var  DatabaseRepository */
    private $databaseRepository;

    public function __construct(DatabaseRepository $databaseRepo)
    {
        $this->databaseRepository = $databaseRepo;
    }

    /**
     * Display a listing of the Database.
     * GET|HEAD /databases
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $databases = $this->databaseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($databases->toArray(), 'Databases retrieved successfully');
    }

    /**
     * Store a newly created Database in storage.
     * POST /databases
     *
     * @param CreateDatabaseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDatabaseAPIRequest $request)
    {
        $input = $request->all();

        $databases = $this->databaseRepository->create($input);

        return $this->sendResponse($databases->toArray(), 'Database saved successfully');
    }

    /**
     * Display the specified Database.
     * GET|HEAD /databases/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Database $database */
        $database = $this->databaseRepository->find($id);

        if (empty($database)) {
            return $this->sendError('Database not found');
        }

        return $this->sendResponse($database->toArray(), 'Database retrieved successfully');
    }

    /**
     * Update the specified Database in storage.
     * PUT/PATCH /databases/{id}
     *
     * @param int $id
     * @param UpdateDatabaseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDatabaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var Database $database */
        $database = $this->databaseRepository->find($id);

        if (empty($database)) {
            return $this->sendError('Database not found');
        }

        $database = $this->databaseRepository->update($input, $id);

        return $this->sendResponse($database->toArray(), 'Database updated successfully');
    }

    /**
     * Remove the specified Database from storage.
     * DELETE /databases/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Database $database */
        $database = $this->databaseRepository->find($id);

        if (empty($database)) {
            return $this->sendError('Database not found');
        }

        $database->delete();

        return $this->sendResponse($id, 'Database deleted successfully');
    }
}
