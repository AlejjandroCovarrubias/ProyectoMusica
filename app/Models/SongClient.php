<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SongClient extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='song_client';
}
