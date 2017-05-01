<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Album;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{

    /**
     * Shows admin/index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showIndex()
    {
        return view('admin.index');
    }

    /**
     * Shows admin\albums page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlbums()
    {
        return view('admin.albums', ['albums' => Album::all()]);
    }

    /**
     * Shows the page of a specific album with song list
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlbum($slug)
    {
        $album = Album::where('slug', $slug)->first();
        return view('admin.album', ['album' => $album]);
    }

    /**
     * Shows the page with the form to editing an album
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editAlbum(Request $request)
    {
        $this->validate($request, [
            'album' => 'sometimes|required|integer',
        ]);

        if (($request->has('album'))) {
            $album = Album::find($request->album) ?? new Album();
            $pageTitle = 'Edit album';
        } else {
            $pageTitle = 'Add album';
            $album = new Album();
        }
        return view('admin.edit-album', ['album' => $album, 'pageTitle' => $pageTitle]);
    }

    /**
     * Saves an album
     *
     * @var Album $album
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAlbum(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|string',
//            'description' => 'present|string',
//            'cover' => 'present|image',
//            'date' => 'required|date',
//            'id' => 'present|integer'
//        ]);

        $album = Album::findOrNew($request->id);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $file->move('files/covers', $file->getClientOriginalName());
            $album->photo = 'files/covers/' . $file->getClientOriginalName();
        }

        $album->fill([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'date' => $request->date,
        ]);
        $album->save();

        return redirect()->route('admin/albums');
    }

    /**
     * Removes an album
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeAlbum(Request $request)
    {
        $this->validate($request, [
            'album' => 'required|integer'
        ]);
        Album::destroy($request->album);
        return redirect()->route('admin/albums');
    }

    /**
     * Shows the page with the form to editing a song
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editSong(Request $request)
    {
        $this->validate($request, [
            'album' => 'sometimes|required|integer',
            'song' => 'sometimes|required|integer',
        ]);

        if ($request->has('album')) {
            $song = new Song();
            $album = Album::find($request->album);
            $pageTitle = 'Edit song';
        } else if ($request->has('song')) {
            $pageTitle = 'Add song';
            $song = Song::find($request->song);
            $album = $song->album;
        }

        return view('admin.edit-song', ['song' => $song, 'album' => $album, 'pageTitle' => $pageTitle]);
    }

    /**
     * Save a song
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveSong(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'present|required|string',
//            'min' => 'present|integer',
//            'sec' => 'present|integer',
//            'id' => 'present|integer',
//            'album_id' => 'present|integer',
//        ]);

        $song = Song::findOrNew($request->id);

        $song->fill([
            'name' => $request->name,
            'duration' => (int)$request->min * 60 + (int)$request->sec,
            'album_id' => (int)$request->album_id
        ]);
        $song->save();

        return redirect()->route('admin/album', ['slug' => $song->album->slug]);
    }

    /**
     * Removes a song
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeSong(Request $request)
    {
        $this->validate($request, [
            'song' => 'required|integer'
        ]);

        $song = Song::find($request->song);
        $album = $song->album;
        $song->delete();

        return redirect()->route('admin/album', ['slug' => $album->slug]);
    }

    public function editDescription()
    {
        return view('admin.edit-description');
    }

    public function saveDescription()
    {
        return redirect()->route('admin');
    }

    public function editBiography()
    {
        return view('admin.edit-biography');
    }

    public function saveBiography()
    {
        return redirect()->route('admin');
    }
}
