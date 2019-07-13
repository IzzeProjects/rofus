<?php

namespace App\Http\Models;

use App\Http\Models\News\Category;
use App\Http\Traits\Search;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string title
 * @property string slug
 * @property int category_id
 * @property string author
 * @property string text
 * @property string announce
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property int status
 */
class News extends Model
{
    use Search;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
