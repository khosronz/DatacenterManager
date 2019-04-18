<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIprangeAPIRequest;
use App\Http\Requests\API\UpdateIprangeAPIRequest;
use App\Models\Iprange;
use App\Repositories\IprangeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IprangeController
 * @package App\Http\Controllers\API
 */

class IprangeAPIController extends AppBaseController
{
    /** @var  IprangeRepository */
    private $iprangeRepository;

    public function __construct(IprangeRepository $iprangeRepo)
    {
        $this->iprangeRepository = $iprangeRepo;
    }

    /**
     * Display a listing of the Iprange.
     * GET|HEAD /ipranges
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ipranges = $this->iprangeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ipranges->toArray(), 'Ipranges retrieved successfully');
    }

    /**
     * Store a newly created Iprange in storage.
     * POST /ipranges
     *
     * @param CreateIprangeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIprangeAPIRequest $request)
    {
        $input = $request->all();

        $ipranges = $this->iprangeRepository->create($input);

        return $this->sendResponse($ipranges->toArray(), 'Iprange saved successfully');
    }

    /**
     * Display the specified Iprange.
     * GET|HEAD /ipranges/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Iprange $iprange */
        $iprange = $this->iprangeRepository->find($id);

        if (empty($iprange)) {
            return $this->sendError('Iprange not found');
        }

        return $this->sendResponse($iprange->toArray(), 'Iprange retrieved successfully');
    }

    /**
     * Update the specified Iprange in storage.
     * PUT/PATCH /ipranges/{id}
     *
     * @param int $id
     * @param UpdateIprangeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIprangeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Iprange $iprange */
        $iprange = $this->iprangeRepository->find($id);

        if (empty($iprange)) {
            return $this->sendError('Iprange not found');
        }

        $iprange = $this->iprangeRepository->update($input, $id);

        return $this->sendResponse($iprange->toArray(), 'Iprange updated successfully');
    }

    /**
     * Remove the specified Iprange from storage.
     * DELETE /ipranges/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Iprange $iprange */
        $iprange = $this->iprangeRepository->find($id);

        if (empty($iprange)) {
            return $this->sendError('Iprange not found');
        }

        $iprange->delete();

        return $this->sendResponse($id, 'Iprange deleted successfully');
    }
}
