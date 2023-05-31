<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mesure extends Model
{
    use HasFactory;

    protected $fillable = [
        'humidity',
        'temperature',
        'captor_id',
    ];

    public function captor() {
        
        return $this->belongsTo(Captor::class);
        // return $this->belongsTo(Captor::class, 'captor_id');
    }
}
