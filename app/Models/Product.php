<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\ProductFilter;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'category',
        'name',
        'size',
        'color',
        'price'
    ];

    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->filter($builder);
    }
}
