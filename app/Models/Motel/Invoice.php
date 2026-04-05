<?php

namespace App\Models\Motel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $table = 'motel_invoices';

    protected $fillable = [
        'contract_id',
        'issued_date',
        'amount',
        'status',
    ];

    protected $casts = [
        'issued_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}
