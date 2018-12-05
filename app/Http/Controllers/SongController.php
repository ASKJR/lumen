<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Singer;




class SongController extends Controller
{
    /**
     * index return all songs
     *
     * @return string
     */
    public function index()
    {
        return response()->json(Song::all());
    }

    /**
     * show a song by id
     *
     * @param integer $id
     * @return string
     */
    public function show($song_id)
    {
        return response()->json(Song::findOrFail($song_id));
    }


    /**
     * get songs by singer
     *
     * @param integer $singer_id
     * @return string
     */
    public function showSongsBySinger($singer_id)
    {
        $singer = Singer::findOrFail($singer_id);

        $songs = Song::BySinger($singer->id)->get();

        return response()->json($songs, 200);
    }

    /**
     * strore a new song
     *
     * @param Request $request
     * @return string
     */
    public function store($singer_id, Request $request)
    {

        $singer = Singer::findOrFail($singer_id);

        $request->merge(['singer_id' => $singer->id]);

        $this->validate($request, [
            'name' => 'required'
        ]);

        return response()->json(Song::create($request->all()), 201);
    }

    /**
     * update a song
     *
     * @param integer $id
     * @param Request $request
     * @return string
     */
    public function update($singer_id, $song_id, Request $request)
    {
        $song = Song::findOrFail($song_id);

        if ($song->singer_id != $singer_id) {
            return response()->json(["error" => "Invalid singer_id"], 404);
        }

        $request->merge(['singer_id' => $singer_id]);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $song->update($request->all());

        return response()->json($song, 200);

    }


    /**
     * delete a song
     * 
     * @param integer $id
     * @return string
     */
    public function destroy($singer_id, $song_id)
    {
        $song = Song::findOrFail($song_id);

        if ($song->singer_id != $singer_id) {
            return response()->json(["error" => "Invalid singer_id"], 404);
        }
        $song->delete();

        return response()->json(['Deleted successfully'], 200);
    }


}
