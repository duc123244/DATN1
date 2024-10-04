<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_sp',
        'image',
        'description',
        'price',
        'stock',
        'variant_id',
        'category_id',
        'supplier_id',
        'battery_id',
        'colour_id',
        'screen_id',
    ];

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function productImages()
{
    return $this->hasMany(ProductImage::class, 'product_id');
}

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function battery()
    {
        return $this->belongsTo(Battery::class, 'battery_id');
    }

    public function colour()
    {
        return $this->belongsTo(Colour::class, 'colour_id');
    }


    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id');
    }
}
