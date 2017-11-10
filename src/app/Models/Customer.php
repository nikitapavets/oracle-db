<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    protected $guarded = [
        'email',
        'password',
        'remember_token',
        'city_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = [
        'city',
    ];

    protected $appends = [
        'full_name',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function notebooks()
    {
        return $this->belongsToMany(Notebook::class, 'baskets');
    }

    public function getFullNameAttribute()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }
}
