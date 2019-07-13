<?php

namespace App\Http\Models\News;

use App\Http\Models\News;
use App\Http\Traits\Search;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string slug
 * @property int status
 */
class Category extends Model
{
    use Search;

    protected $table = 'news_categories';

    protected $guarded = [];

    public $timestamps = false;

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
