<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSoftwaredescRequest;
use App\Http\Requests\UpdateSoftwaredescRequest;
use App\Repositories\SoftwaredescRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SoftwaredescController extends AppBaseController
{
    /** @var  SoftwaredescRepository */
    private $softwaredescRepository;

    public function __construct(SoftwaredescRepository $softwaredescRepo)
    {
        $this->softwaredescRepository = $softwaredescRepo;
    }

    /**
     * Display a listing of the Softwaredesc.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $softwaredescs = $this->softwaredescRepository->paginate(10);

        return view('softwaredescs.index')
            ->with('softwaredescs', $softwaredescs);
    }

    /**
     * Show the form for creating a new Softwaredesc.
     *
     * @return Response
     */
    public function create()
    {
        return view('softwaredescs.create');
    }

    /**
     * Store a newly created Softwaredesc in storage.
     *
     * @param CreateSoftwaredescRequest $request
     *
     * @return Response
     */
    public function store(CreateSoftwaredescRequest $request)
    {
        $input = $request->all();

        $softwaredesc = $this->softwaredescRepository->create($input);

        Flash::success('Softwaredesc saved successfully.');

        return redirect(route('softwaredescs.index'));
    }

    /**
     * Display the specified Softwaredesc.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $softwaredesc = $this->softwaredescRepository->find($id);

        if (empty($softwaredesc)) {
            Flash::error('Softwaredesc not found');

            return redirect(route('softwaredescs.index'));
        }

        return view('softwaredescs.show')->with('softwaredesc', $softwaredesc);
    }

    /**
     * Show the form for editing the specified Softwaredesc.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $softwaredesc = $this->softwaredescRepository->find($id);

        if (empty($softwaredesc)) {
            Flash::error('Softwaredesc not found');

            return redirect(route('softwaredescs.index'));
        }

        return view('softwaredescs.edit')->with('softwaredesc', $softwaredesc);
    }

    /**
     * Update the specified Softwaredesc in storage.
     *
     * @param int $id
     * @param UpdateSoftwaredescRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoftwaredescRequest $request)
    {
        $softwaredesc = $this->softwaredescRepository->find($id);

        if (empty($softwaredesc)) {
            Flash::error('Softwaredesc not found');

            return redirect(route('softwaredescs.index'));
        }

        $softwaredesc = $this->softwaredescRepository->update($request->all(), $id);

        Flash::success('Softwaredesc updated successfully.');

        return redirect(route('softwaredescs.index'));
    }

    /**
     * Remove the specified Softwaredesc from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $softwaredesc = $this->softwaredescRepository->find($id);

        if (empty($softwaredesc)) {
            Flash::error('Softwaredesc not found');

            return redirect(route('softwaredescs.index'));
        }

        $this->softwaredescRepository->delete($id);

        Flash::success('Softwaredesc deleted successfully.');

        return redirect(route('softwaredescs.index'));
    }
}
