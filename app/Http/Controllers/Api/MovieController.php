<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//-------- import the model---------//
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Movie::get(),200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. splitting our request data
        // Inserting Movie information
        $request1 = $request->only(['MovieName','image','description','Gere','Length']);
        $movieInfo = Movie::create($request1);

        // Movie screening dates
        // takes Movie_id, MovieShowDate(i), screen_id
        $request2 = $request->except('MovieName','image','description','Gere','Length','_token');

            // select the last id of table movie
            $MovieID =  DB::table('movie')->latest('id')->first();
            $MovieID = $MovieID->id;

            $screen_id = $request2['screen_id'];
            $MovieShowDate = $request2["MovieShowDate0"];

            $done = DB::table('movie_screen')->insert(
                ['movie_id' => $MovieID, "MovieShowDate" => $MovieShowDate, 'screen_id' => $screen_id ]
            );

        return response()->json($done,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $movie = Movie::where('id',$id)->first();

        if(is_null($movie)){
            return response()->json(['messge'=>'Record not found'], 404);
        }
        return response()->json($movie, 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $movie = Movie::find($id);
        if(is_null($movie)){
            return response()->json(['messge'=>'Record not found'], 404);
        }
        $movie->update($request->all());
        return response()->json($movie, 200);
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
        $movie = Movie::find($id);
        if(is_null($movie)){
            return response()->json(['messge'=>'Record not found'], 404);
        }
        $movie->delete();
        return response()->json(null, 204);// no content
    }
}
