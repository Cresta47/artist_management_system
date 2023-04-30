<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = "artist";

    protected $fillable = [
        "name",
        "dob",
        "gender",
        "address",
        "first_release_year",
        "no_of_albums_released",
    ];

    protected $appends = ["gender_text"];


    public function getRoleTextAttribute()
    {
        $roles = [
            "super_admin" => "Super Admin",
            "artist_manager" => "Artist Manager",
            "artist" => "Artist",
        ];
        return $roles[$this->role];
    }

    public function getGenderTextAttribute()
    {
        $genders = [
            "m" => "Male",
            "f" => "Female",
            "o" => "Others",
        ];
        return $genders[$this->gender];
    }
}
