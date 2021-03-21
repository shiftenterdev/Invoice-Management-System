<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'client_id',
        'invoice_id',
        'payment_amount',
        'payment_type',
        'payment_date',
        'transaction_reference',
        'private_notes',
        'status'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
