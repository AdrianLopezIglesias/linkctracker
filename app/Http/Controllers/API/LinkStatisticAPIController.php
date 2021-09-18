<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLinkStatisticAPIRequest;
use App\Http\Requests\API\UpdateLinkStatisticAPIRequest;
use App\Models\LinkStatistic;
use App\Repositories\LinkStatisticRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LinkStatisticController
 * @package App\Http\Controllers\API
 */

class LinkStatisticAPIController extends AppBaseController
{
    /** @var  LinkStatisticRepository */
    private $linkStatisticRepository;

    public function __construct(LinkStatisticRepository $linkStatisticRepo)
    {
        $this->linkStatisticRepository = $linkStatisticRepo;
    }

    /**
     * Display a listing of the LinkStatistic.
     * GET|HEAD /linkStatistics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $linkStatistics = $this->linkStatisticRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($linkStatistics->toArray(), 'Link Statistics retrieved successfully');
    }

    /**
     * Store a newly created LinkStatistic in storage.
     * POST /linkStatistics
     *
     * @param CreateLinkStatisticAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLinkStatisticAPIRequest $request)
    {
        $input = $request->all();

        $linkStatistic = $this->linkStatisticRepository->create($input);

        return $this->sendResponse($linkStatistic->toArray(), 'Link Statistic saved successfully');
    }

    /**
     * Display the specified LinkStatistic.
     * GET|HEAD /linkStatistics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LinkStatistic $linkStatistic */
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            return $this->sendError('Link Statistic not found');
        }

        return $this->sendResponse($linkStatistic->toArray(), 'Link Statistic retrieved successfully');
    }

    /**
     * Update the specified LinkStatistic in storage.
     * PUT/PATCH /linkStatistics/{id}
     *
     * @param int $id
     * @param UpdateLinkStatisticAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLinkStatisticAPIRequest $request)
    {
        $input = $request->all();

        /** @var LinkStatistic $linkStatistic */
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            return $this->sendError('Link Statistic not found');
        }

        $linkStatistic = $this->linkStatisticRepository->update($input, $id);

        return $this->sendResponse($linkStatistic->toArray(), 'LinkStatistic updated successfully');
    }

    /**
     * Remove the specified LinkStatistic from storage.
     * DELETE /linkStatistics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LinkStatistic $linkStatistic */
        $linkStatistic = $this->linkStatisticRepository->find($id);

        if (empty($linkStatistic)) {
            return $this->sendError('Link Statistic not found');
        }

        $linkStatistic->delete();

        return $this->sendSuccess('Link Statistic deleted successfully');
    }
}
