<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLinkAPIRequest;
use App\Http\Requests\API\UpdateLinkAPIRequest;
use App\Models\Link;
use App\Repositories\LinkRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LinkController
 * @package App\Http\Controllers\API
 */

class LinkAPIController extends AppBaseController
{
    /** @var  LinkRepository */
    private $linkRepository;

    public function __construct(LinkRepository $linkRepo)
    {
        $this->linkRepository = $linkRepo;
    }

    /**
     * Display a listing of the Link.
     * GET|HEAD /links
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $links = $this->linkRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($links->toArray(), 'Links retrieved successfully');
    }

    /**
     * Store a newly created Link in storage.
     * POST /links
     *
     * @param CreateLinkAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLinkAPIRequest $request)
    {
        $input = $request->all();

        $link = $this->linkRepository->create($input);

        return $this->sendResponse($link->toArray(), 'Link saved successfully');
    }

    /**
     * Display the specified Link.
     * GET|HEAD /links/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Link $link */
        $link = $this->linkRepository->find($id);

        if (empty($link)) {
            return $this->sendError('Link not found');
        }

        return $this->sendResponse($link->toArray(), 'Link retrieved successfully');
    }

    /**
     * Update the specified Link in storage.
     * PUT/PATCH /links/{id}
     *
     * @param int $id
     * @param UpdateLinkAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLinkAPIRequest $request)
    {
        $input = $request->all();

        /** @var Link $link */
        $link = $this->linkRepository->find($id);

        if (empty($link)) {
            return $this->sendError('Link not found');
        }

        $link = $this->linkRepository->update($input, $id);

        return $this->sendResponse($link->toArray(), 'Link updated successfully');
    }

    /**
     * Remove the specified Link from storage.
     * DELETE /links/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Link $link */
        $link = $this->linkRepository->find($id);

        if (empty($link)) {
            return $this->sendError('Link not found');
        }

        $link->delete();

        return $this->sendSuccess('Link deleted successfully');
    }
}
