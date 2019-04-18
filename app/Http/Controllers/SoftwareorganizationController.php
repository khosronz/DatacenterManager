<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSoftwareorganizationRequest;
use App\Http\Requests\UpdateSoftwareorganizationRequest;
use App\Repositories\SoftwareorganizationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SoftwareorganizationController extends AppBaseController
{
    /** @var  SoftwareorganizationRepository */
    private $softwareorganizationRepository;

    public function __construct(SoftwareorganizationRepository $softwareorganizationRepo)
    {
        $this->softwareorganizationRepository = $softwareorganizationRepo;
    }

    /**
     * Display a listing of the Softwareorganization.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $softwareorganizations = $this->softwareorganizationRepository->paginate(10);

        return view('softwareorganizations.index')
            ->with('softwareorganizations', $softwareorganizations);
    }

    /**
     * Show the form for creating a new Softwareorganization.
     *
     * @return Response
     */
    public function create()
    {
        return view('softwareorganizations.create');
    }

    /**
     * Store a newly created Softwareorganization in storage.
     *
     * @param CreateSoftwareorganizationRequest $request
     *
     * @return Response
     */
    public function store(CreateSoftwareorganizationRequest $request)
    {
        $input = $request->all();

        $softwareorganization = $this->softwareorganizationRepository->create($input);

        Flash::success('Softwareorganization saved successfully.');

        return redirect(route('softwareorganizations.index'));
    }

    /**
     * Display the specified Softwareorganization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $softwareorganization = $this->softwareorganizationRepository->find($id);

        if (empty($softwareorganization)) {
            Flash::error('Softwareorganization not found');

            return redirect(route('softwareorganizations.index'));
        }

        return view('softwareorganizations.show')->with('softwareorganization', $softwareorganization);
    }

    /**
     * Show the form for editing the specified Softwareorganization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $softwareorganization = $this->softwareorganizationRepository->find($id);

        if (empty($softwareorganization)) {
            Flash::error('Softwareorganization not found');

            return redirect(route('softwareorganizations.index'));
        }

        return view('softwareorganizations.edit')->with('softwareorganization', $softwareorganization);
    }

    /**
     * Update the specified Softwareorganization in storage.
     *
     * @param int $id
     * @param UpdateSoftwareorganizationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoftwareorganizationRequest $request)
    {
        $softwareorganization = $this->softwareorganizationRepository->find($id);

        if (empty($softwareorganization)) {
            Flash::error('Softwareorganization not found');

            return redirect(route('softwareorganizations.index'));
        }

        $softwareorganization = $this->softwareorganizationRepository->update($request->all(), $id);

        Flash::success('Softwareorganization updated successfully.');

        return redirect(route('softwareorganizations.index'));
    }

    /**
     * Remove the specified Softwareorganization from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $softwareorganization = $this->softwareorganizationRepository->find($id);

        if (empty($softwareorganization)) {
            Flash::error('Softwareorganization not found');

            return redirect(route('softwareorganizations.index'));
        }

        $this->softwareorganizationRepository->delete($id);

        Flash::success('Softwareorganization deleted successfully.');

        return redirect(route('softwareorganizations.index'));
    }
}
