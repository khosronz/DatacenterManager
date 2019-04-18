<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVmRequest;
use App\Http\Requests\UpdateVmRequest;
use App\Repositories\VmRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class VmController extends AppBaseController
{
    /** @var  VmRepository */
    private $vmRepository;

    public function __construct(VmRepository $vmRepo)
    {
        $this->vmRepository = $vmRepo;
    }

    /**
     * Display a listing of the Vm.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $vms = $this->vmRepository->paginate(10);

        return view('vms.index')
            ->with('vms', $vms);
    }

    /**
     * Show the form for creating a new Vm.
     *
     * @return Response
     */
    public function create()
    {
        return view('vms.create');
    }

    /**
     * Store a newly created Vm in storage.
     *
     * @param CreateVmRequest $request
     *
     * @return Response
     */
    public function store(CreateVmRequest $request)
    {
        $input = $request->all();

        $input['password'] = encrypt($input['password']);

        $vm = $this->vmRepository->create($input);

        Flash::success('Vm saved successfully.');

        return redirect(route('vms.index'));
    }

    /**
     * Display the specified Vm.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vm = $this->vmRepository->find($id);

        if (empty($vm)) {
            Flash::error('Vm not found');

            return redirect(route('vms.index'));
        }

        return view('vms.show')->with('vm', $vm);
    }

    /**
     * Show the form for editing the specified Vm.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vm = $this->vmRepository->find($id);

        if (empty($vm)) {
            Flash::error('Vm not found');

            return redirect(route('vms.index'));
        }

        return view('vms.edit')->with('vm', $vm);
    }

    /**
     * Update the specified Vm in storage.
     *
     * @param int $id
     * @param UpdateVmRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVmRequest $request)
    {
        $input = $request->all();
        $input['password'] = encrypt($input['password']);

        $vm = $this->vmRepository->find($id);

        if (empty($vm)) {
            Flash::error('Vm not found');

            return redirect(route('vms.index'));
        }

        $vm = $this->vmRepository->update($input, $id);

        Flash::success('Vm updated successfully.');

        return redirect(route('vms.index'));
    }

    /**
     * Remove the specified Vm from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vm = $this->vmRepository->find($id);

        if (empty($vm)) {
            Flash::error('Vm not found');

            return redirect(route('vms.index'));
        }

        $this->vmRepository->delete($id);

        Flash::success('Vm deleted successfully.');

        return redirect(route('vms.index'));
    }
}
