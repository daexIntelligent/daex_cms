<?php
namespace App\Http\Resources\Customer;

// use App\Http\Resources\BaseCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->map(function ($customer) {
            return [
                'customer_id' => $customer->customer_id,
                'email' => $customer->email,
                'company_name_tw' => $customer->company_name_tw,
                'company_name_en' => $customer->company_name_en,
                'contact' => $customer->contact,
                'status' => $customer->status,
                'mobile' => $customer->mobile,
                'tel' => $customer->tel,
                'ext' => $customer->ext,
                'service' => $customer->service,
                'created_at' => $customer->created_at
            ];
        });
    }
}