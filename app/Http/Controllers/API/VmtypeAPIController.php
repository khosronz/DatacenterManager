<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVmtypeAPIRequest;
use App\Http\Requests\API\UpdateVmtypeAPIRequest;
use App\Models\Vmtype;
use App\Repositories\VmtypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VmtypeController
 * @package App\Http\Controllers\API
 */

class VmtypeAPIController extends AppBaseController
{
    /** @var  VmtypeRepository */
    private $vmtypeRepository;

    public function __construct(VmtypeRepository $vmtypeRepo)
    {
        $this->vmtypeRepository = $vmtypeRepo;
    }

    /**
     * Display a listing of the Vmtype.
     * GET|HEAD /vmtypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $vmtypes = $this->vmtypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($vmtypes->toArray(), 'Vmtypes retrieved successfully');
    }

    /**
     * Store a newly created Vmtype in storage.
     * POST /vmtypes
     *
     * @param CreateVmtypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVmtypeAPIRequest $request)
    {
        $input = $request->all();

        $vmtypes = $this->vmtypeRepository->create($input);

        return $this->sendResponse($vmtypes->toArray(), 'Vmtype saved successfully');
    }

    /**
     * Display the specified Vmtype.
     * GET|HEAD /vmtypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Vmtype $vmtype */
        $vmtype = $this->vmtypeRepository->find($id);

        if (empty($vmtype)) {
            return $this->sendError('Vmtype not found');
        }

        return $this->sendResponse($vmtype->toArray(), 'Vmtype retrieved successfully');
    }

    /**
     * Update the specified Vmtype in storage.
     * PUT/PATCH /vmtypes/{id}
     *
     * @param int $id
     * @param UpdateVmtypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVmtypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vmtype $vmtype */
        $vmtype = $this->vmtypeRepository->find($id);

        if (empty($vmtype)) {
            return $this->sendError('Vmtype not found');
        }

        $vmtype = $this->vmtypeRepository->update($input, $id);

        return $this->sendResponse($vmtype->toArray(), 'Vmtype updated successfully');
    }

    /**
     * Remove the specified Vmtype from storage.
     * DELETE /vmtypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Vmtype $vmtype */
        $vmtype = $this->vmtypeRepository->find($id);

        if (empty($vmtype)) {
            return $this->sendError('Vmtype not found');
        }

        $vmtype->delete();

        return $this->sendResponse($id, 'Vmtype deleted successfully');
    }
}
