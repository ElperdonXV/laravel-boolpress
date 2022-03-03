<?php

namespace App\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

       public function createSlug($title)
    {
        $slug = Str::slug($title, '-');

        $oldcategory = Category::where('slug', $slug)->first();

        $counter = 0;
        while ($oldcategory) {
            $newSlug = $slug . '-' . $counter;
            $oldcategory = Category::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }

    /**
     * Relationship with posts 
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany('App\Model\Post');
    }
}