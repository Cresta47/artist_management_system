<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'music';

    protected $fillable = [
        "artist_id",
        "title",
        "album_name",
        "genre",
    ];

    protected $appends = ["genre_text"];

    public function getGenreTextAttribute()
    {
        $genres = [
            "rnb" => "R&B",
            "country" => "Country",
            "classic" => "Classic",
            "rock" => "Rock",
            "jazz" => "Jazz"
        ];

        return $genres[$this->genre];
    }
}
