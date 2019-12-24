<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//-------- import the model---------//
use App\User;

use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::get(), 200);// TODO where clause username = mido30
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
        //
        $rules = [
            'UserName' =>  'required|min:3',
            'Password' => 'required|min:6|max:10'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            // invalid syntax (empty fields,violating rules)
            return response()->json($validator->errors(), 400);
        }
        

        // check if user exists before
        $user = User::where('UserName',$request->input('UserName'));

        if(!is_null($user)){
            return response()->json(['message'=>'user exists please log in'],400);
        }


        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get a specific user info
        $user = User::where('UserName',$id)->first();

        if(is_null($user)){
            return response()->json(['message'=>'Record not found'], 404);
        }
        return response()->json($user, 200);
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
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::where('UserName',$id);
        if($user->isEmpty()){
            return response()->json(['message'=>'Record not found'], 404);
        }
        $user->update($request->all());
        return response()->json($user, 200);
    }


    public function login(Request $request){
        $user = User::where('UserName',$request->input('UserName'))->get();
        if($user->isEmpty()){
            return response()->json(['message'=>'Please sign up account does not exist'],404);
        }

        $user = User::where([
            ['UserName',$request->input('UserName')],
            ['Password',$request->input('Password')]
        ])->get();
        
        if($user->isEmpty()){
            return response()->json(['message'=>'wrong password'],404);
        }

        return response()->json($user,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::where('UserName',$id);
        if(is_null($user)){
            return response()->json(['message'=>'Record not found'], 404);
        }
        $user->delete();
        return response()->json(null, 204);// no content
    }
}
