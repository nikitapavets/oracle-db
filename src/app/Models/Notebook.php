<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = [
        'title',
        'description',
        'config',
        'price',
    ];

    protected $with = [
        'brand',
        'provider',
        'images',
    ];

    protected $appends = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getNameAttribute()
    {
        return sprintf('%s %s', $this->brand->title, $this->title);
    }
}
