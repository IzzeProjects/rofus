<?php

namespace App\Http\Models\Member;

use App\Http\Models\Member;
use App\Http\Models\News;
use App\Http\Traits\Search;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string url
 * @property int member_id
 * @property int order
 */
class Image extends Model
{
    protected $table = 'members_images';

    protected $guarded = [];

    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo(Member::clasws);
    }

}
