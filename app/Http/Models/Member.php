<?php

namespace App\Http\Models;

use App\Http\Models\Member\Image;
use App\Http\Traits\Search;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string first_name
 * @property string surname
 * @property string city
 * @property string vk
 * @property string instagram
 * @property string facebook
 * @property string twitter
 * @property string info
 * @property string image
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class Member extends Model
{
    use Search;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
