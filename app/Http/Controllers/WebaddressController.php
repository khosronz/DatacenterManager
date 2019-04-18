<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWebaddressRequest;
use App\Http\Requests\UpdateWebaddressRequest;
use App\Repositories\WebaddressRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WebaddressController extends AppBaseController
{
    /** @var  WebaddressRepository */
    private $webaddressRepository;

    public function __construct(WebaddressRepository $webaddressRepo)
    {
        $this->webaddressRepository = $webaddressRepo;
    }

    /**
     * Display a listing of the Webaddress.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $webaddresses = $this->webaddressRepository->paginate(10);

        return view('webaddresses.index')
            ->with('webaddresses', $webaddresses);
    }

    /**
     * Show the form for creating a new Webaddress.
     *
     * @return Response
     */
    public function create()
    {
        return view('webaddresses.create');
    }

    /**
     * Store a newly created Webaddress in storage.
     *
     * @param CreateWebaddressRequest $request
     *
     * @return Response
     */
    public function store(CreateWebaddressRequest $request)
    {
        $input = $request->all();

        $webaddress = $this->webaddressRepository->create($input);

        Flash::success('Webaddress saved successfully.');

        return redirect(route('webaddresses.index'));
    }

    /**
     * Display the specified Webaddress.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $webaddress = $this->webaddressRepository->find($id);

        if (empty($webaddress)) {
            Flash::error('Webaddress not found');

            return redirect(route('webaddresses.index'));
        }

        return view('webaddresses.show')->with('webaddress', $webaddress);
    }

    /**
     * Show the form for editing the specified Webaddress.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $webaddress = $this->webaddressRepository->find($id);

        if (empty($webaddress)) {
            Flash::error('Webaddress not found');

            return redirect(route('webaddresses.index'));
        }

        return view('webaddresses.edit')->with('webaddress', $webaddress);
    }

    /**
     * Update the specified Webaddress in storage.
     *
     * @param int $id
     * @param UpdateWebaddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWebaddressRequest $request)
    {
        $webaddress = $this->webaddressRepository->find($id);

        if (empty($webaddress)) {
            Flash::error('Webaddress not found');

            return redirect(route('webaddresses.index'));
        }

        $webaddress = $this->webaddressRepository->update($request->all(), $id);

        Flash::success('Webaddress updated successfully.');

        return redirect(route('webaddresses.index'));
    }

    /**
     * Remove the specified Webaddress from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $webaddress = $this->webaddressRepository->find($id);

        if (empty($webaddress)) {
            Flash::error('Webaddress not found');

            return redirect(route('webaddresses.index'));
        }

        $this->webaddressRepository->delete($id);

        Flash::success('Webaddress deleted successfully.');

        return redirect(route('webaddresses.index'));
    }
}
