<?php

namespace App\Http\Controllers;

class IndexController
{
    public function showIndex()
    {
        return view('index');
    }

    public function showAlbums()
    {
        return view('albums');
    }

    public function showAlbum(string $name)
    {
        return view('album');
    }

    public function showBiography()
    {
        return view('biography');
    }
}