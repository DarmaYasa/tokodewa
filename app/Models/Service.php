<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'telp',
        'product',
        'type',
        'description',
        'cost',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserNameAttribute()
    {
        if($this->user_id !== null) {
            return $this->user->name;
        }
        return $this->name;
    }

    public function getUserAddressAttribute()
    {
        if($this->user_id !== null) {
            return $this->user->address;
        }
        return $this->address;
    }

    public function getUserTelpAttribute()
    {
        if($this->user_id !== null) {
            return $this->user->telp;
        }
        return $this->telp;
    }
}
