<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVmAPIRequest;
use App\Http\Requests\API\UpdateVmAPIRequest;
use App\Models\Vm;
use App\Repositories\VmRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VmController
 * @package App\Http\Controllers\API
 */

class VmAPIController extends AppBaseController
{
    /** @var  VmRepository */
    private $vmRepository;

    public function __construct(VmRepository $vmRepo)
    {
        $this->vmRepository = $vmRepo;
    }

    /**
     * Display a listing of the Vm.
     * GET|HEAD /vms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $vms = $this->vmRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($vms->toArray(), 'Vms retrieved successfully');
    }

    /**
     * Store a newly created Vm in storage.
     * POST /vms
     *
     * @param CreateVmAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVmAPIRequest $request)
    {
        $input = $request->all();

        $vms = $this->vmRepository->create($input);

        return $this->sendResponse($vms->toArray(), 'Vm saved successfully');
    }

    /**
     * Display the specified Vm.
     * GET|HEAD /vms/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Vm $vm */
        $vm = $this->vmRepository->find($id);

        if (empty($vm)) {
            return $this->sendError('Vm not found');
        }

        return $this->sendResponse($vm->toArray(), 'Vm retrieved successfully');
    }

    /**
     * Update the specified Vm in storage.
     * PUT/PATCH /vms/{id}
     *
     * @param int $id
     * @param UpdateVmAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVmAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vm $vm */
        $vm = $this->vmRepository->find($id);

        if (empty($vm)) {
            return $this->sendError('Vm not found');
        }

        $vm = $this->vmRepository->update($input, $id);

        return $this->sendResponse($vm->toArray(), 'Vm updated successfully');
    }

    /**
     * Remove the specified Vm from storage.
     * DELETE /vms/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Vm $vm */
        $vm = $this->vmRepository->find($id);

        if (empty($vm)) {
            return $this->sendError('Vm not found');
        }

        $vm->delete();

        return $this->sendResponse($id, 'Vm deleted successfully');
    }
}
