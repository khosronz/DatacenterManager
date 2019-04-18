<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConnectionAPIRequest;
use App\Http\Requests\API\UpdateConnectionAPIRequest;
use App\Models\Connection;
use App\Repositories\ConnectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConnectionController
 * @package App\Http\Controllers\API
 */

class ConnectionAPIController extends AppBaseController
{
    /** @var  ConnectionRepository */
    private $connectionRepository;

    public function __construct(ConnectionRepository $connectionRepo)
    {
        $this->connectionRepository = $connectionRepo;
    }

    /**
     * Display a listing of the Connection.
     * GET|HEAD /connections
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $connections = $this->connectionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($connections->toArray(), 'Connections retrieved successfully');
    }

    /**
     * Store a newly created Connection in storage.
     * POST /connections
     *
     * @param CreateConnectionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConnectionAPIRequest $request)
    {
        $input = $request->all();

        $connections = $this->connectionRepository->create($input);

        return $this->sendResponse($connections->toArray(), 'Connection saved successfully');
    }

    /**
     * Display the specified Connection.
     * GET|HEAD /connections/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Connection $connection */
        $connection = $this->connectionRepository->find($id);

        if (empty($connection)) {
            return $this->sendError('Connection not found');
        }

        return $this->sendResponse($connection->toArray(), 'Connection retrieved successfully');
    }

    /**
     * Update the specified Connection in storage.
     * PUT/PATCH /connections/{id}
     *
     * @param int $id
     * @param UpdateConnectionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConnectionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Connection $connection */
        $connection = $this->connectionRepository->find($id);

        if (empty($connection)) {
            return $this->sendError('Connection not found');
        }

        $connection = $this->connectionRepository->update($input, $id);

        return $this->sendResponse($connection->toArray(), 'Connection updated successfully');
    }

    /**
     * Remove the specified Connection from storage.
     * DELETE /connections/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Connection $connection */
        $connection = $this->connectionRepository->find($id);

        if (empty($connection)) {
            return $this->sendError('Connection not found');
        }

        $connection->delete();

        return $this->sendResponse($id, 'Connection deleted successfully');
    }
}
