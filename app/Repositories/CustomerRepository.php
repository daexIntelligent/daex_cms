<?php
namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use App\Exceptions\UserUnauthorizedException;
use Config;

class CustomerRepository
{
    public function getCustomerList()
    {
        try {
            return Customer::all();
        } catch (ModelNotFoundException $exception) {
            // 
        }
    }
}
