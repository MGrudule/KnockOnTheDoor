<?php

namespace App\Http\Controllers\Resource;

use App\Message;
use App\Http\Controllers\ResourceController;
use App\Http\Resources\MessageResource;
use Illuminate\Http\Request;

class MessageController extends ResourceController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MessageResource::collection(Message::all());
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
        return new MessageResource(Message::create([
            'user_id' => $data['user']['id'],
            'subject_id' => $data['subject']['id'],
            'body' => $data['body'],
        ]));
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
        return "Message deleted";
    }

}
