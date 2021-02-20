<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;


    // Mass Assignment
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    // Relation many to one (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation many to many (Category)
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
