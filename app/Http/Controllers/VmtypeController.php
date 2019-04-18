<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVmtypeRequest;
use App\Http\Requests\UpdateVmtypeRequest;
use App\Repositories\VmtypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class VmtypeController extends AppBaseController
{
    /** @var  VmtypeRepository */
    private $vmtypeRepository;

    public function __construct(VmtypeRepository $vmtypeRepo)
    {
        $this->vmtypeRepository = $vmtypeRepo;
    }

    /**
     * Display a listing of the Vmtype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $vmtypes = $this->vmtypeRepository->paginate(10);

        return view('vmtypes.index')
            ->with('vmtypes', $vmtypes);
    }

    /**
     * Show the form for creating a new Vmtype.
     *
     * @return Response
     */
    public function create()
    {
        return view('vmtypes.create');
    }

    /**
     * Store a newly created Vmtype in storage.
     *
     * @param CreateVmtypeRequest $request
     *
     * @return Response
     */
    public function store(CreateVmtypeRequest $request)
    {
        $input = $request->all();

        $vmtype = $this->vmtypeRepository->create($input);

        Flash::success('Vmtype saved successfully.');

        return redirect(route('vmtypes.index'));
    }

    /**
     * Display the specified Vmtype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vmtype = $this->vmtypeRepository->find($id);

        if (empty($vmtype)) {
            Flash::error('Vmtype not found');

            return redirect(route('vmtypes.index'));
        }

        return view('vmtypes.show')->with('vmtype', $vmtype);
    }

    /**
     * Show the form for editing the specified Vmtype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vmtype = $this->vmtypeRepository->find($id);

        if (empty($vmtype)) {
            Flash::error('Vmtype not found');

            return redirect(route('vmtypes.index'));
        }

        return view('vmtypes.edit')->with('vmtype', $vmtype);
    }

    /**
     * Update the specified Vmtype in storage.
     *
     * @param int $id
     * @param UpdateVmtypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVmtypeRequest $request)
    {
        $vmtype = $this->vmtypeRepository->find($id);

        if (empty($vmtype)) {
            Flash::error('Vmtype not found');

            return redirect(route('vmtypes.index'));
        }

        $vmtype = $this->vmtypeRepository->update($request->all(), $id);

        Flash::success('Vmtype updated successfully.');

        return redirect(route('vmtypes.index'));
    }

    /**
     * Remove the specified Vmtype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vmtype = $this->vmtypeRepository->find($id);

        if (empty($vmtype)) {
            Flash::error('Vmtype not found');

            return redirect(route('vmtypes.index'));
        }

        $this->vmtypeRepository->delete($id);

        Flash::success('Vmtype deleted successfully.');

        return redirect(route('vmtypes.index'));
    }
}
