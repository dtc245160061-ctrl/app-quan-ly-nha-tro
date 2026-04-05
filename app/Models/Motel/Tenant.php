<?php

namespace App\Models\Motel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    protected $table = 'motel_tenants';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'id_card',
        'address',
    ];

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}
