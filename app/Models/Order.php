<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillable = ['user_id', 'product_id', 'quantity', 'uuid'];
    public function getTotal()
    {
        return $this->belongsTo(('App\Models\Product')->price) * ($this->quantity);
    }
}
