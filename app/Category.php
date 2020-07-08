<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasSlug;
    
    protected $fillable = ['name', 'description', 'slug'];
    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
                            ->generateSlugFrom('name')
                            ->saveSlugTo('slug');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
