<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIprangeRequest;
use App\Http\Requests\UpdateIprangeRequest;
use App\Repositories\IprangeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class IprangeController extends AppBaseController
{
    /** @var  IprangeRepository */
    private $iprangeRepository;

    public function __construct(IprangeRepository $iprangeRepo)
    {
        $this->iprangeRepository = $iprangeRepo;
    }

    /**
     * Display a listing of the Iprange.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ipranges = $this->iprangeRepository->paginate(10);

        return view('ipranges.index')
            ->with('ipranges', $ipranges);
    }

    /**
     * Show the form for creating a new Iprange.
     *
     * @return Response
     */
    public function create()
    {
        return view('ipranges.create');
    }

    /**
     * Store a newly created Iprange in storage.
     *
     * @param CreateIprangeRequest $request
     *
     * @return Response
     */
    public function store(CreateIprangeRequest $request)
    {
        $input = $request->all();

        $iprange = $this->iprangeRepository->create($input);

        Flash::success('Iprange saved successfully.');

        return redirect(route('ipranges.index'));
    }

    /**
     * Display the specified Iprange.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $iprange = $this->iprangeRepository->find($id);

        if (empty($iprange)) {
            Flash::error('Iprange not found');

            return redirect(route('ipranges.index'));
        }

        return view('ipranges.show')->with('iprange', $iprange);
    }

    /**
     * Show the form for editing the specified Iprange.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $iprange = $this->iprangeRepository->find($id);

        if (empty($iprange)) {
            Flash::error('Iprange not found');

            return redirect(route('ipranges.index'));
        }

        return view('ipranges.edit')->with('iprange', $iprange);
    }

    /**
     * Update the specified Iprange in storage.
     *
     * @param int $id
     * @param UpdateIprangeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIprangeRequest $request)
    {
        $iprange = $this->iprangeRepository->find($id);

        if (empty($iprange)) {
            Flash::error('Iprange not found');

            return redirect(route('ipranges.index'));
        }

        $iprange = $this->iprangeRepository->update($request->all(), $id);

        Flash::success('Iprange updated successfully.');

        return redirect(route('ipranges.index'));
    }

    /**
     * Remove the specified Iprange from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $iprange = $this->iprangeRepository->find($id);

        if (empty($iprange)) {
            Flash::error('Iprange not found');

            return redirect(route('ipranges.index'));
        }

        $this->iprangeRepository->delete($id);

        Flash::success('Iprange deleted successfully.');

        return redirect(route('ipranges.index'));
    }
}
