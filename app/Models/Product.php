<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'price', 'slug'];

        /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['expired_at'];
}
