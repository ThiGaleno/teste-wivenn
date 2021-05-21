<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        // 'client_id'
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
