<?php

namespace App\Models\Motel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $table = 'motel_rooms';

    protected $fillable = [
        'name',
        'price',
        'capacity',
        'status',
    ];

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}
