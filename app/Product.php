<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_title',
        'product_price',
        'product_price_sales',
        'product_desciption',
        'product_content',
        'product_keyword',
        'product_tag',
        'product_slug',
        'product_avatar',
        'product_categories',
        'product_publish',
        'product_status',
        'product_views',
        'product_sort',
        'IsDelete'
    ];
}
