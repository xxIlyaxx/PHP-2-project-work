<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

/**
 * Class Album
 * @package App
 *
 * @property string name
 * @property string slug
 * @property string photo
 * @property string description
 * @property string date
 */
class Album extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'cover',
        'description',
        'date',
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function setCoverAttribute($value)
    {
        if (array_has($this->attributes, 'cover') && null !== $this->attributes['cover']) {
            File::delete(public_path($this->attributes['cover']));
        }
        $this->attributes['cover'] = $value;
    }
}
