<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends BaseModel
{
    use SoftDeletes;

    protected $primaryKey = 'customer_id';
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
}
