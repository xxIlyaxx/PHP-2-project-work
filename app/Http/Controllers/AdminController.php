<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Song;
use App\Album;
use App\Photo;

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
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'present|string',
            'cover' => 'present|image',
            'date' => 'required|date',
        ]);

        $album = Album::findOrNew($request->id);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $file->move('files/covers', $file->getClientOriginalName());
            $album->cover = 'files/covers/' . $file->getClientOriginalName();
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
        $album = Album::find($request->album);
        $album->songs()->delete();
        $album->delete();
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
        $this->validate($request, [
            'name' => 'present|required|string',
            'min' => 'present|integer',
            'sec' => 'present|integer',
            'album_id' => 'required|integer',
        ]);

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

    /**
     * Shows the page with the form to editing the description
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editDescription()
    {
        $description = File::get(storage_path('files/description.txt'));
        return view('admin.edit-description', ['description' => $description]);
    }

    /**
     * Saves the description
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveDescription(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|string'
        ]);

        File::put(storage_path('files/description.txt'), $request->description);

        return redirect()->route('admin');
    }

    /**
     * Shows the page with the form to editing the biography
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editBiography()
    {
        $biography = File::get(storage_path('files/biography.txt'));

        return view('admin.edit-biography', ['biography' => $biography]);
    }

    /**
     * Saves the biography
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveBiography(Request $request)
    {
        $this->validate($request, [
            'biography' => 'required|string'
        ]);

        File::put(storage_path('files/biography.txt'), $request->biography);

        return redirect()->route('admin');
    }

    public function showPhotos()
    {
        return view('admin.photos', ['photos' => Photo::all()]);
    }

    /**
     * Shows the page with the form to editing a photo
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPhoto(Request $request)
    {
        if ($request->has('photo')) {
            $photo = Photo::find($request->photo);
            $pageTitle = 'Edit photo';
        } else {
            $photo = new Photo();
            $pageTitle = 'Add photo';
        }

        return view('admin.edit-photo', ['photo' => $photo, 'pageTitle' => $pageTitle]);
    }

    /**
     * Saves a photo
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePhoto(Request $request)
    {
        $photo = Photo::findOrNew($request->id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file->move('files/photos', $file->getClientOriginalName());
            $photo->photo = 'files/photos/' . $file->getClientOriginalName();
        }

        $photo->fill([
            'description' => $request->description
        ]);

        $photo->save();

        return redirect()->route('admin/photos');
    }

    /**
     * Removes a photo
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removePhoto(Request $request)
    {
        Photo::destroy($request->photo);
        return redirect()->route('admin/photos');
    }
}
