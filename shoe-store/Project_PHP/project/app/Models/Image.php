<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //protected $uploads = '/images/products';
    protected $fillable = ['file_name'];

  //  public function products(){
    //    return $this->belongsTo(Product::class);
    //}

    public function products()
    {
        return $this->hasMany( Product::class);
    }
}
