<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

/**
 * Class Photo
 * @package App
 *
 * @property string $photo
 * @property string $description
 */
class Photo extends Model
{
    protected $fillable = [
        'photo',
        'description'
    ];

    public function setPhotoAttribute($value)
    {
        if (array_has($this->attributes, 'photo') && null !== $this->attributes['photo']) {
            File::delete(public_path($this->attributes['photo']));
        }
        $this->attributes['photo'] = $value;
    }
}
