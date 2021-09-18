<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkStatisticRequest;
use App\Http\Requests\UpdateLinkStatisticRequest;
use App\Repositories\LinkStatisticRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LinkStatisticController extends AppBaseController
{
    /** @var  LinkStatisticRepository */
    private $linkStatisticRepository;

    public function __construct(LinkStatisticRepository $linkStatisticRepo)
    {
        $this->linkStatisticRepository = $linkStatisticRepo;
    }

    /**
     * Display a listing of the LinkStatistic.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $linkstatistics = $this->linkStatisticRepository->paginate(10);

        return view('link_statistics.index')
            ->with('linkstatistics', $linkstatistics);
    }

    /**
     * Show the form for creating a new LinkStatistic.
     *
     * @return Response
     */
    public function create()
    {
        return view('link_statistics.create');
    }

    /**
     * Store a newly created LinkStatistic in storage.
     *
     * @param CreateLinkStatisticRequest $request
     *
     * @return Response
     */
    public function store(CreateLinkStatisticRequest $request)
    {
        $input = $request->all();

        $linkStatistic = $this->linkStatisticRepository->create($input);

        Flash::success('Link Statistic saved successfully.');

        return redirect(route('linkstatistics.index'));
    }

    /**
     * Display the specified LinkStatistic.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            Flash::error('Link Statistic not found');

            return redirect(route('linkstatistics.index'));
        }

        return view('link_statistics.show')->with('linkStatistic', $linkStatistic);
    }

    /**
     * Show the form for editing the specified LinkStatistic.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            Flash::error('Link Statistic not found');

            return redirect(route('linkstatistics.index'));
        }

        return view('link_statistics.edit')->with('linkStatistic', $linkStatistic);
    }

    /**
     * Update the specified LinkStatistic in storage.
     *
     * @param int $id
     * @param UpdateLinkStatisticRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLinkStatisticRequest $request)
    {
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            Flash::error('Link Statistic not found');

            return redirect(route('linkstatistics.index'));
        }

        $linkStatistic = $this->linkStatisticRepository->update($request->all(), $id);

        Flash::success('Link Statistic updated successfully.');

        return redirect(route('linkstatistics.index'));
    }

    /**
     * Remove the specified LinkStatistic from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            Flash::error('Link Statistic not found');

            return redirect(route('linkstatistics.index'));
        }

        $this->linkStatisticRepository->delete($id);

        Flash::success('Link Statistic deleted successfully.');

        return redirect(route('linkstatistics.index'));
    }
}
