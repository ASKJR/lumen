<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singer;




class SingerController extends Controller
{
    /**
     * index return all singers
     *
     * @return string
     */
    public function index()
    {
        return response()->json(Singer::all());
    }

    /**
     * show return a singer by id
     *
     * @param integer $id
     * @return string
     */
    public function show($id)
    {
        return response()->json(Singer::findOrFail($id));
    }


    /**
     * strore a new singer
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'genre' => 'required'
        ]);

        return response()->json(Singer::create($request->all()), 201);
    }

    /**
     * update a singer
     *
     * @param integer $id
     * @param Request $request
     * @return string
     */
    public function update($id, Request $request)
    {
        $singer = Singer::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'genre' => 'required'
        ]);

        $singer->update($request->all());

        return response()->json($singer, 200);

    }


    /**
     * delete a singer
     * 
     * @param integer $id
     * @return string
     */
    public function destroy($id)
    {
        Singer::findOrFail($id)->delete();

        return response()->json(['Deleted successfully'], 200);
    }


}
