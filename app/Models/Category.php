<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'title',
        'slug'
    ];

    public function api()
    {
        return $this->hasMany(Api::class);
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
            ->orWhere('slug', 'like', '%' . $query . '%');
    }
}