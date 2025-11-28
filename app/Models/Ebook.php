<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'synopsis',
        'isbn',
        'format',
        'file_path',
        'published_year',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
