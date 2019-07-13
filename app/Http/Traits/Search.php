<?php

namespace App\Http\Traits;

trait Search
{
    /**
     * @param $query
     * @param string $search
     * @param array $fields
     * @return mixed
     */
    public function scopeSearch($query, $search, $fields)
    {
        if($search && count($fields) > 0){
            foreach ($fields as $field){
                $query->orWhere($field, 'like', '%' . $search . '%');
            }
        }
        return $query;
    }
}
