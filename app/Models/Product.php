<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'product_category_id',
        'quantity',
        'price',
        'description',
        'thumbnail'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id')->withTrashed();
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function getThumbnailUrlAttribute()
    {
        if($this->thumbnail != null) {
            return asset(Storage::url($this->thumbnail));
        } else {
            return 'https://dummyimage.com/500x500/6366f1/ffff.png&text=' . $this->name;
        }
    }
}
