<?php

namespace App\Http\Controllers\Api;

use App\Message;
use App\Http\Controllers\ApiController;
use App\Http\Resources\MessageResource;
use Illuminate\Http\Request;

class MessageController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MessageResource::collection(Message::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = parent::getData($request);
        $message = Message::create([
            'user_id' => $data['user_id'],
            'subject_id' => $data['subject_id'],
            'body' => $data['body'],
        ]);
        $message->categories()->sync($data['categories']);
        // TODO: tags
        return new MessageResource($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return new MessageResource($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $data = parent::getData($request);
        $message->update([
            'body' => $data['body'],
        ]);
        return new MessageResource($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return response()->json();
    }
}
