<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = ['name', 'price', 'stock'];

    //  public function category()
    //  {
    //      return $this->belongsTo(Category::class);
    //  }
 
    //  public function brand()
    //  {
    //      return $this->belongsTo(Brand::class);
    //  }

    use HasFactory;

    // protected $fillable = ['name', 'price', 'stock']; //fillable mengizinkan kolom" diisi secara masall dalam 1 comment.
    //tidak diisi primary key karna sudah diisi secara otomatis oleh laravel
}
