<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // No timestamps
    public $timestamps = false;

    // Mass Assigment
    protected $fillable = [
        'id',
        'title',
        'slug'
    ];

    // Relation many to many (Category)
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }
}
