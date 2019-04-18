<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSoftwareRequest;
use App\Http\Requests\UpdateSoftwareRequest;
use App\Repositories\SoftwareRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SoftwareController extends AppBaseController
{
    /** @var  SoftwareRepository */
    private $softwareRepository;

    public function __construct(SoftwareRepository $softwareRepo)
    {
        $this->softwareRepository = $softwareRepo;
    }

    /**
     * Display a listing of the Software.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $software = $this->softwareRepository->paginate(10);

        return view('software.index')
            ->with('software', $software);
    }

    /**
     * Show the form for creating a new Software.
     *
     * @return Response
     */
    public function create()
    {
        return view('software.create');
    }

    /**
     * Store a newly created Software in storage.
     *
     * @param CreateSoftwareRequest $request
     *
     * @return Response
     */
    public function store(CreateSoftwareRequest $request)
    {
        $input = $request->all();

        $software = $this->softwareRepository->create($input);

        Flash::success('Software saved successfully.');

        return redirect(route('software.index'));
    }

    /**
     * Display the specified Software.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $software = $this->softwareRepository->find($id);

        if (empty($software)) {
            Flash::error('Software not found');

            return redirect(route('software.index'));
        }

        return view('software.show')->with('software', $software);
    }

    /**
     * Show the form for editing the specified Software.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $software = $this->softwareRepository->find($id);

        if (empty($software)) {
            Flash::error('Software not found');

            return redirect(route('software.index'));
        }

        return view('software.edit')->with('software', $software);
    }

    /**
     * Update the specified Software in storage.
     *
     * @param int $id
     * @param UpdateSoftwareRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoftwareRequest $request)
    {
        $software = $this->softwareRepository->find($id);

        if (empty($software)) {
            Flash::error('Software not found');

            return redirect(route('software.index'));
        }

        $software = $this->softwareRepository->update($request->all(), $id);

        Flash::success('Software updated successfully.');

        return redirect(route('software.index'));
    }

    /**
     * Remove the specified Software from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $software = $this->softwareRepository->find($id);

        if (empty($software)) {
            Flash::error('Software not found');

            return redirect(route('software.index'));
        }

        $this->softwareRepository->delete($id);

        Flash::success('Software deleted successfully.');

        return redirect(route('software.index'));
    }
}
