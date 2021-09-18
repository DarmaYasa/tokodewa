<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

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
        return $this->belongsTo(ProductCategory::class);
    }

    public function getThumbnnailUrl()
    {
        if($this->thumbnail != null) {
            return Storage::url($this->thumbnail);
        } else {
            return null;
        }
    }
}
