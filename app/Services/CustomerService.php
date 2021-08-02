<?php
namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService
{
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getCustomerList()
    {
        return $this->customerRepository->getCustomerList();
    }
}
