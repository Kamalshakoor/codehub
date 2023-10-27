<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','price','image','project','seller_id','subcategory_id'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search');

        
        if (!$search)
        {
            return $query;    
        }

        // dd($search);
        return $query->where('title', 'LIKE', "%{$search}%");
    }
}