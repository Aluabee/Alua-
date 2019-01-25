<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class post extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'posts.body' => 10,
            'posts.title' => 5,
            'posts.subtitle' => 3,

        ],

    ];

    public function tags() {
        return $this->belongsToMany('App\Model\user\tag', 'post_tags')->withTimestamps();
    }

    public function categories() {
        return $this->belongsToMany('App\Model\user\category', 'category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
