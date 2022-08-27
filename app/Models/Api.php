<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'method', 'status', 'docs_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%');
    }
}