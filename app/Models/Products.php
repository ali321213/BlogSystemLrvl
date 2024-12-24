<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Products extends Model
{
    use Notifiable;
    protected $fillable = [
        'name',
        'price',
        'brand',
        'unit',
        'img',
        'category',
        'created_at',
        'updated_at',
        'unit'
    ];
}