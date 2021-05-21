<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'curriculo_url',
        'ip'
    ];
    public function addresses(){
        return $this->hasMany(Address::class);
    }
}