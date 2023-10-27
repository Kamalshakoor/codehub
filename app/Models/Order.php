<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['buyer_id', 'seller_id', 'post_id', 'status'];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
