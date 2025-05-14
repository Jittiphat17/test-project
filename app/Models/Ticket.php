<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'registrant_id',
        'status',
        'registration_date',
        'events',
        'total_price',
        'slip_path',
    ];

    protected $casts = [
        'events' => 'array',
        'registration_date' => 'date',
    ];

    public function registrant()
    {
        return $this->belongsTo(Registrant::class);
    }
}
