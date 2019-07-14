<?php

namespace App\Http\Models;

use App\Http\Traits\Search;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use Search;

    protected $guarded = [];
}
