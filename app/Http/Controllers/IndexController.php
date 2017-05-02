<?php

namespace App\Http\Controllers;

use File;
use App\Album;
use App\Photo;

class IndexController extends Controller
{
    /**
     * Shows home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showIndex()
    {
        $description = File::get(storage_path('files/description.txt'));
        return view('index', ['description' => $description]);
    }

    /**
     * Shows page with albums
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlbums()
    {
        return view('albums', ['albums' => Album::all()]);
    }

    /**
     * Shows album page
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlbum($slug)
    {
        $album = Album::where('slug', $slug)->first();
        return view('album', ['slug' => $slug, 'album' => $album]);
    }

    /**
     * Show biography page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBiography()
    {
        $biography = File::get(storage_path('files/biography.txt'));
        return view('biography', ['biography' => $biography]);
    }

    /**
     * Shows page with photos
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPhotos()
    {
        $photos = Photo::all();
        return view('photos', ['photos' => $photos]);
    }
}