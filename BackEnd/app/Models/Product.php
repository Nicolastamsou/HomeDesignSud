<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'categorie',
        'image_url'
    ];
}