<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;
use Config;

class BaseCollection extends ResourceCollection
{
    private $pagination;
    private $apiStatus;

    public function __construct($resource, $apiStatus = null)
    {
        // $this->pagination = $this->paginationSchema($resource);
        // $this->apiStatus = $apiStatus ?? Response::HTTP_OK;
        // parent::__construct($resource->getCollection());
    }

    public function with($request)
    {
        return [
            'meta' => [
                'status' => $this->apiStatus,
                'pagination' => $this->pagination,
            ],
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Config::get('api.status.' . $this->apiStatus, Response::HTTP_OK));
    }

    private function paginationSchema($resource)
    {
        return [
            // 'total' => isser($resource->total()) ? $resource->total() : null,
            // 'per_page' => $resource->perPage(),
            // 'current_page' => $resource->currentPage(),
            // 'total_pages' => $resource->lastPage()
        ];
    }
}