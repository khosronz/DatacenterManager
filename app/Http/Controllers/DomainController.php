<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDomainRequest;
use App\Http\Requests\UpdateDomainRequest;
use App\Repositories\DomainRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DomainController extends AppBaseController
{
    /** @var  DomainRepository */
    private $domainRepository;

    public function __construct(DomainRepository $domainRepo)
    {
        $this->domainRepository = $domainRepo;
    }

    /**
     * Display a listing of the Domain.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $domains = $this->domainRepository->all();

        return view('domains.index')
            ->with('domains', $domains);
    }

    /**
     * Show the form for creating a new Domain.
     *
     * @return Response
     */
    public function create()
    {
        return view('domains.create');
    }

    /**
     * Store a newly created Domain in storage.
     *
     * @param CreateDomainRequest $request
     *
     * @return Response
     */
    public function store(CreateDomainRequest $request)
    {
        $input = $request->all();

        $input['password']=encrypt($input['password']);

        $domain = $this->domainRepository->create($input);

        Flash::success('Domain saved successfully.');

        return redirect(route('domains.index'));
    }

    /**
     * Display the specified Domain.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        return view('domains.show')->with('domain', $domain);
    }

    /**
     * Show the form for editing the specified Domain.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        $domain->password=decrypt($domain->password);

        return view('domains.edit')->with('domain', $domain);
    }

    /**
     * Update the specified Domain in storage.
     *
     * @param int $id
     * @param UpdateDomainRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDomainRequest $request)
    {
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        $input=$request->all();
        $input['password']=encrypt($input['password']);

        $domain = $this->domainRepository->update($input, $id);

        Flash::success('Domain updated successfully.');

        return redirect(route('domains.index'));
    }

    /**
     * Remove the specified Domain from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        $this->domainRepository->delete($id);

        Flash::success('Domain deleted successfully.');

        return redirect(route('domains.index'));
    }
}
