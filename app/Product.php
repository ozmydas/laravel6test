<?php
  
namespace App;
   
use Illuminate\Database\Eloquent\Model;
   
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img', 'cat', 'price',
    ];

    protected $table = "t_product";
}