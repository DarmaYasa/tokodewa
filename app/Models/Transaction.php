<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'date',
        'user_id',
        'paid'
    ];

    protected $dates = [
        'date'
    ];

    protected $casts = [
        'paid' => 'boolean'
    ];

    protected $appends = ['grand_total'];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function getGrandTotalAttribute()
    {
        return $this->details->sum('total');
    }


}
