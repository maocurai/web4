<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function authors() {
        return $this->belongsTo(Author::class, "author_id");
    }

    public function topics() {
        return $this->belongsToMany(Topic::class);
    }
}
