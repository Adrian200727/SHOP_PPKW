<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    use HasFactory;

    protected $table = 'products'; // Pastikan ini menunjuk ke tabel yang benar
    protected $fillable = [
        'name', 
        'description',
        'price',
        'stock',
        'image'
    ];
}