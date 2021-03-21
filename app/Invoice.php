<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    //
    protected $fillable = [
        'client_id',
        'invoice_number',
        'invoice_date',
        'po_number',
        'amount',
        'balance',
        'due_date',
        'deposit_amount',
        'discount',
        'discount_type',
        'private_notes',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
