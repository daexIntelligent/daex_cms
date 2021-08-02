<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel
{
    use SoftDeletes;

    protected $primaryKey = 'user_id';
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $hidden = ['password'];
}