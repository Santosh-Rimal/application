<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'banner_image',
        'description',
        'short_description',
        'date',
        'slug',
        'created_by',

        'seo_title',
        'meta_description',
        'meta_keywords',
        'seo_schema'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
