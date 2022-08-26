<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changelog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('content', 'like', '%' . $query . '%')
            ->orWhere('title', 'like', '%' . $query . '%');
    }
}