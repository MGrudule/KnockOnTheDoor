<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\ApiController;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CommentResource::collection(Comment::latest()->get());
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
        $comment = Comment::create([
            'message_id' => $data['message_id'],
            'user_id' => auth()->user()->id,
            'comment' => $data['comment'],
        ]);
        $this->sendNewCommentMail($comment);
        return new CommentResource($comment);
    }

    public function sendNewCommentMail(Comment $comment)
    {
        $to = $comment->message()->first()->user()->first();
        return \Mail::to($to)->send(
            new \App\Mail\NewComment($comment));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $data = parent::getData($request);
        $comment->update([
            'comment' => $data['comment'],
        ]);
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json();
    }
}
