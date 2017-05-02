<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Song
 * @package App
 *
 * @property string $name
 * @property string $duration
 * @property string $album_id
 */
class Song extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'album_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function getMinutesAttribute()
    {
        return intdiv($this->duration, 60);
    }

    public function getSecondsAttribute()
    {
        return (int)$this->duration % 60;
    }
}
