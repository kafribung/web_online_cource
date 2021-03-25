<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PlaylistRequest;
use App\Http\Resources\Backend\PlaylistResource;
use App\Models\{Category, Playlist};
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    // READ
    public function index()
    {
        $playlists = Playlist::with('user','categories')->latest()->get();
        return view('backend.playlist.playlist', compact('playlists'));
    }

    // CREATE
    public function create()
    {
        $categories = Category::get(['id','title']);
        return view('backend.playlist.create', compact('categories'));
    }

    // STORE
    public function store(PlaylistRequest $request)
    {
        $data = $request->validated();
        if ($img=  $request->file('img')) {
            $data['img'] = $img->storeAs('img_playlist', time() .  '.' . $img->getClientOriginalExtension()); 
        }
        $data['slug'] = \Str::slug($request->title);
        // Eloquent Create Playlist
        $playlist =  $request->user()->playlists()->create($data);
        // Eloquent Relation manyToMany
        $playlist->categories()->attach($request->category);
        return response()->json(['msg', 'The item was created successfully']);
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit(Playlist $playlist)
    {
        // return response(['data' => $playlist], 200);
        return PlaylistResource::make($playlist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
