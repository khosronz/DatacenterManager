<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePortsoftwareAPIRequest;
use App\Http\Requests\API\UpdatePortsoftwareAPIRequest;
use App\Models\Portsoftware;
use App\Repositories\PortsoftwareRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PortsoftwareController
 * @package App\Http\Controllers\API
 */

class PortsoftwareAPIController extends AppBaseController
{
    /** @var  PortsoftwareRepository */
    private $portsoftwareRepository;

    public function __construct(PortsoftwareRepository $portsoftwareRepo)
    {
        $this->portsoftwareRepository = $portsoftwareRepo;
    }

    /**
     * Display a listing of the Portsoftware.
     * GET|HEAD /portsoftwares
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $portsoftwares = $this->portsoftwareRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($portsoftwares->toArray(), 'Portsoftwares retrieved successfully');
    }

    /**
     * Store a newly created Portsoftware in storage.
     * POST /portsoftwares
     *
     * @param CreatePortsoftwareAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePortsoftwareAPIRequest $request)
    {
        $input = $request->all();

        $portsoftwares = $this->portsoftwareRepository->create($input);

        return $this->sendResponse($portsoftwares->toArray(), 'Portsoftware saved successfully');
    }

    /**
     * Display the specified Portsoftware.
     * GET|HEAD /portsoftwares/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Portsoftware $portsoftware */
        $portsoftware = $this->portsoftwareRepository->find($id);

        if (empty($portsoftware)) {
            return $this->sendError('Portsoftware not found');
        }

        return $this->sendResponse($portsoftware->toArray(), 'Portsoftware retrieved successfully');
    }

    /**
     * Update the specified Portsoftware in storage.
     * PUT/PATCH /portsoftwares/{id}
     *
     * @param int $id
     * @param UpdatePortsoftwareAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortsoftwareAPIRequest $request)
    {
        $input = $request->all();

        /** @var Portsoftware $portsoftware */
        $portsoftware = $this->portsoftwareRepository->find($id);

        if (empty($portsoftware)) {
            return $this->sendError('Portsoftware not found');
        }

        $portsoftware = $this->portsoftwareRepository->update($input, $id);

        return $this->sendResponse($portsoftware->toArray(), 'Portsoftware updated successfully');
    }

    /**
     * Remove the specified Portsoftware from storage.
     * DELETE /portsoftwares/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Portsoftware $portsoftware */
        $portsoftware = $this->portsoftwareRepository->find($id);

        if (empty($portsoftware)) {
            return $this->sendError('Portsoftware not found');
        }

        $portsoftware->delete();

        return $this->sendResponse($id, 'Portsoftware deleted successfully');
    }
}
