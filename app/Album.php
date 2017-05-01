<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Album
 * @package App
 *
 * @property string id
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
        'photo',
        'description',
        'date',
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function setPhotoAttribute($value)
    {
        if (array_has($this->attributes, 'photo') && null !== $this->attributes['photo']) {
            Storage::delete($this->attributes['photo']);
        }
        $this->attributes['photo'] = $value;
    }
}
