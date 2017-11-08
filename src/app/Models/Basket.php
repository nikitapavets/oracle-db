<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = [
        'quantity',
        'discount',
    ];

    protected $guarded = [
        'customer_id',
        'notebook_id',
    ];

    protected $hidden = [
        'customer_id',
        'notebook_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notebook()
    {
        return $this->belongsTo(Notebook::class);
    }
}
