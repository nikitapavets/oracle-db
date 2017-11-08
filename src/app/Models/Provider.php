<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'code',
        'phone',
        'priority',
    ];

    public function notebooks()
    {
        return $this->hasMany(Notebook::class);
    }
}
