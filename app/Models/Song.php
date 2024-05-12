<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function client()
    {
        return $this->belongsToMany(Client::class, 'song_client');
    }

    public function playlist()
    {
        return $this->belongsToMany(Playlist::class);
    }
}
