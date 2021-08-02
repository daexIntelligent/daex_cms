<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\ModelCreatingEvent;
use App\Events\ModelUpdatingEvent;

class BaseModel extends Model
{
    protected $dispatchesEvents = [
        // 'creating' => ModelCreatingEvent::class,
        // 'updating' => ModelUpdatingEvent::class,
    ];
}