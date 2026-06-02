<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Mendaftarkan kolom yang boleh diisi secara massal (Mengatasi MassAssignmentException)
    protected $fillable = ['name', 'slug', 'description'];

    // Relasi One-to-Many: Satu kategori memiliki banyak produk
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}