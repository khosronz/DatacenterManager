<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDomainAPIRequest;
use App\Http\Requests\API\UpdateDomainAPIRequest;
use App\Models\Domain;
use App\Repositories\DomainRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DomainController
 * @package App\Http\Controllers\API
 */

class DomainAPIController extends AppBaseController
{
    /** @var  DomainRepository */
    private $domainRepository;

    public function __construct(DomainRepository $domainRepo)
    {
        $this->domainRepository = $domainRepo;
    }

    /**
     * Display a listing of the Domain.
     * GET|HEAD /domains
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $domains = $this->domainRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($domains->toArray(), 'Domains retrieved successfully');
    }

    /**
     * Store a newly created Domain in storage.
     * POST /domains
     *
     * @param CreateDomainAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDomainAPIRequest $request)
    {
        $input = $request->all();

        $domains = $this->domainRepository->create($input);

        return $this->sendResponse($domains->toArray(), 'Domain saved successfully');
    }

    /**
     * Display the specified Domain.
     * GET|HEAD /domains/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Domain $domain */
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            return $this->sendError('Domain not found');
        }

        return $this->sendResponse($domain->toArray(), 'Domain retrieved successfully');
    }

    /**
     * Update the specified Domain in storage.
     * PUT/PATCH /domains/{id}
     *
     * @param int $id
     * @param UpdateDomainAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDomainAPIRequest $request)
    {
        $input = $request->all();

        /** @var Domain $domain */
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            return $this->sendError('Domain not found');
        }

        $domain = $this->domainRepository->update($input, $id);

        return $this->sendResponse($domain->toArray(), 'Domain updated successfully');
    }

    /**
     * Remove the specified Domain from storage.
     * DELETE /domains/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Domain $domain */
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            return $this->sendError('Domain not found');
        }

        $domain->delete();

        return $this->sendResponse($id, 'Domain deleted successfully');
    }
}
