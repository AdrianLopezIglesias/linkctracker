<?php

namespace App\Http\Controllers;

use App\DataTables\LinkStatisticDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLinkStatisticRequest;
use App\Http\Requests\UpdateLinkStatisticRequest;
use App\Repositories\LinkStatisticRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
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
     * @param LinkStatisticDataTable $linkStatisticDataTable
     * @return Response
     */
    public function index(LinkStatisticDataTable $linkStatisticDataTable)
    {
        return $linkStatisticDataTable->render('link_statistics.index');
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

        return redirect(route('linkStatistics.index'));
    }

    /**
     * Display the specified LinkStatistic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            Flash::error('Link Statistic not found');

            return redirect(route('linkStatistics.index'));
        }

        return view('link_statistics.show')->with('linkStatistic', $linkStatistic);
    }

    /**
     * Show the form for editing the specified LinkStatistic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            Flash::error('Link Statistic not found');

            return redirect(route('linkStatistics.index'));
        }

        return view('link_statistics.edit')->with('linkStatistic', $linkStatistic);
    }

    /**
     * Update the specified LinkStatistic in storage.
     *
     * @param  int              $id
     * @param UpdateLinkStatisticRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLinkStatisticRequest $request)
    {
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            Flash::error('Link Statistic not found');

            return redirect(route('linkStatistics.index'));
        }

        $linkStatistic = $this->linkStatisticRepository->update($request->all(), $id);

        Flash::success('Link Statistic updated successfully.');

        return redirect(route('linkStatistics.index'));
    }

    /**
     * Remove the specified LinkStatistic from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            Flash::error('Link Statistic not found');

            return redirect(route('linkStatistics.index'));
        }

        $this->linkStatisticRepository->delete($id);

        Flash::success('Link Statistic deleted successfully.');

        return redirect(route('linkStatistics.index'));
    }
}
