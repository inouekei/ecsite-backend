<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillable = ['name', 'image_link', 'desc_ttl', 'desc_body', 'price'];
}
