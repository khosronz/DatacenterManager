<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePortsoftwareRequest;
use App\Http\Requests\UpdatePortsoftwareRequest;
use App\Repositories\PortsoftwareRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PortsoftwareController extends AppBaseController
{
    /** @var  PortsoftwareRepository */
    private $portsoftwareRepository;

    public function __construct(PortsoftwareRepository $portsoftwareRepo)
    {
        $this->portsoftwareRepository = $portsoftwareRepo;
    }

    /**
     * Display a listing of the Portsoftware.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $portsoftwares = $this->portsoftwareRepository->paginate(10);

        return view('portsoftwares.index')
            ->with('portsoftwares', $portsoftwares);
    }

    /**
     * Show the form for creating a new Portsoftware.
     *
     * @return Response
     */
    public function create()
    {
        return view('portsoftwares.create');
    }

    /**
     * Store a newly created Portsoftware in storage.
     *
     * @param CreatePortsoftwareRequest $request
     *
     * @return Response
     */
    public function store(CreatePortsoftwareRequest $request)
    {
        $input = $request->all();

        $portsoftware = $this->portsoftwareRepository->create($input);

        Flash::success('Portsoftware saved successfully.');

        return redirect(route('portsoftwares.index'));
    }

    /**
     * Display the specified Portsoftware.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $portsoftware = $this->portsoftwareRepository->find($id);

        if (empty($portsoftware)) {
            Flash::error('Portsoftware not found');

            return redirect(route('portsoftwares.index'));
        }

        return view('portsoftwares.show')->with('portsoftware', $portsoftware);
    }

    /**
     * Show the form for editing the specified Portsoftware.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $portsoftware = $this->portsoftwareRepository->find($id);

        if (empty($portsoftware)) {
            Flash::error('Portsoftware not found');

            return redirect(route('portsoftwares.index'));
        }

        return view('portsoftwares.edit')->with('portsoftware', $portsoftware);
    }

    /**
     * Update the specified Portsoftware in storage.
     *
     * @param int $id
     * @param UpdatePortsoftwareRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortsoftwareRequest $request)
    {
        $portsoftware = $this->portsoftwareRepository->find($id);

        if (empty($portsoftware)) {
            Flash::error('Portsoftware not found');

            return redirect(route('portsoftwares.index'));
        }

        $portsoftware = $this->portsoftwareRepository->update($request->all(), $id);

        Flash::success('Portsoftware updated successfully.');

        return redirect(route('portsoftwares.index'));
    }

    /**
     * Remove the specified Portsoftware from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $portsoftware = $this->portsoftwareRepository->find($id);

        if (empty($portsoftware)) {
            Flash::error('Portsoftware not found');

            return redirect(route('portsoftwares.index'));
        }

        $this->portsoftwareRepository->delete($id);

        Flash::success('Portsoftware deleted successfully.');

        return redirect(route('portsoftwares.index'));
    }
}
