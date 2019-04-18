<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoleuserAPIRequest;
use App\Http\Requests\API\UpdateRoleuserAPIRequest;
use App\Models\Roleuser;
use App\Repositories\RoleuserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RoleuserController
 * @package App\Http\Controllers\API
 */

class RoleuserAPIController extends AppBaseController
{
    /** @var  RoleuserRepository */
    private $roleuserRepository;

    public function __construct(RoleuserRepository $roleuserRepo)
    {
        $this->roleuserRepository = $roleuserRepo;
    }

    /**
     * Display a listing of the Roleuser.
     * GET|HEAD /roleusers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roleusers = $this->roleuserRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($roleusers->toArray(), 'Roleusers retrieved successfully');
    }

    /**
     * Store a newly created Roleuser in storage.
     * POST /roleusers
     *
     * @param CreateRoleuserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleuserAPIRequest $request)
    {
        $input = $request->all();

        $roleusers = $this->roleuserRepository->create($input);

        return $this->sendResponse($roleusers->toArray(), 'Roleuser saved successfully');
    }

    /**
     * Display the specified Roleuser.
     * GET|HEAD /roleusers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Roleuser $roleuser */
        $roleuser = $this->roleuserRepository->find($id);

        if (empty($roleuser)) {
            return $this->sendError('Roleuser not found');
        }

        return $this->sendResponse($roleuser->toArray(), 'Roleuser retrieved successfully');
    }

    /**
     * Update the specified Roleuser in storage.
     * PUT/PATCH /roleusers/{id}
     *
     * @param int $id
     * @param UpdateRoleuserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleuserAPIRequest $request)
    {
        $input = $request->all();

        /** @var Roleuser $roleuser */
        $roleuser = $this->roleuserRepository->find($id);

        if (empty($roleuser)) {
            return $this->sendError('Roleuser not found');
        }

        $roleuser = $this->roleuserRepository->update($input, $id);

        return $this->sendResponse($roleuser->toArray(), 'Roleuser updated successfully');
    }

    /**
     * Remove the specified Roleuser from storage.
     * DELETE /roleusers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Roleuser $roleuser */
        $roleuser = $this->roleuserRepository->find($id);

        if (empty($roleuser)) {
            return $this->sendError('Roleuser not found');
        }

        $roleuser->delete();

        return $this->sendResponse($id, 'Roleuser deleted successfully');
    }
}
