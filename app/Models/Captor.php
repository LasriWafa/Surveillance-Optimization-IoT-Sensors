<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'IMEI',
        'type',
        'image',
        'manufactor'
    ];
    
    public function user() {
        
        return $this->belongsTo(User::class);
    }

    public function mesures() {
        
        return $this->hasMany(mesure::class);
    }
}
