<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    Retrieving all of the Users.
    public function index()
    {
       $user = User::all();
       return UserResource::collection($user);
    }
    public function leaderboard(){
        $topUsers = User::orderByDesc('score')->take(5)->get();
        return UserResource::collection($topUsers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->score > 100){
            return response()->json([
               'Score cant be bigger than 100'
            ]);
        }
        $user = User::create([
            "name"=>$request->name,
            "score"=>$request->score,
        ]);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name'=>$request->name,
            "score"=>$request->score,
        ]);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
           'Item has been deleted'
        ]);
    }
}
