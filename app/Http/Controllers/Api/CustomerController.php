<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Http\Resources\Customer\CustomerCollection;
use Illuminate\Support\Arr;

class CustomerController
{
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function customerList()
    {
        return new CustomerCollection($this->customerService->getCustomerList());
    }
}