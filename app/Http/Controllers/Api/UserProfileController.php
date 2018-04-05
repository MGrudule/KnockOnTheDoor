<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\ApiController;
use App\Http\Resources\UserProfileResource;
use Illuminate\Http\Request;

class UserProfileController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserProfileResource::collection(User::orderBy('name')->get());
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        return new UserProfileResource($profile);
    }

    public function currentProfile() {
        return new UserProfileResource(auth()->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
        $data = parent::getData($request);
        $profile->update([
            'name' => $data['name'],
            // 'email' => $data['email'],
            'summary' => $data['summary'],
        ]);
        $profile->categories()->sync($data['categories']);
        $profile->updateResources($data['resources']);

        return new UserProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $profile)
    {
        $profile->delete();
        return response()->json();
    }

    public function updateImage(Request $request)
    {
        $response = [];
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $this->storeImage($request->file('file'));
            } else {
                $response['error'] = "File is invalid";
            }
        } else {
            $response['error'] = "No file on request";
        }
        return response()->json($response);
    }

    private function storeImage($file)
    {
        $file->store('public');
    }
}
