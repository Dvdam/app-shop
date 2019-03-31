<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
        // return $this->belongsTo(Category::class)->where('deleted_at', '=', NULL);
    }
    // $product->images
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }
// NOmbre y ruta de la iamgen destacada
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage)
            $featuredImage = $this->images()->first();

        if ($featuredImage){
            return $featuredImage->url;
        }
        //Si no existe ninguna imagen mostrmos la imgen por default
        return '/images/default.png';
    }

    public function getCategoryNameAttribute()
    {
        if ($this->category)
            return $this->category->name;
        return 'General';

    }

}
