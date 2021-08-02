<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;
use Config;

class BaseResource extends JsonResource
{
    private $apiStatus;

    public function __construct($resource, $apiStatus = null)
    {
        $this->apiStatus = $apiStatus ?? Response::HTTP_OK;
        parent::__construct($resource);
    }

    public function with($request)
    {
        return [
            'meta' => [
                'status' => $this->apiStatus,
                'pagination' => null,
            ],
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Config::get('api.status.' . $this->apiStatus, Response::HTTP_OK));
    }

    public function toArray($request)
    {
        return [
            'data' => (
                !is_null($this->resource)
                && is_scalar($this->resource)
            ) ? $this->resource : parent::toArray($request)
        ];
    }
}