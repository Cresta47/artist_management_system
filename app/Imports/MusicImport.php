<?php

namespace App\Imports;

use App\Models\Music;
use Maatwebsite\Excel\Concerns\ToModel;

class MusicImport implements ToModel
{

    public function model(array $row)
    {
        return new Music([
            "artist_id" => request()->artistId,
            'title'     => $row[0],
            'album_name'    => $row[1],
            'genre' => $row[2],
         ]);
    }
}
