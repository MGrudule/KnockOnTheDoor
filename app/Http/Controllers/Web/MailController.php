<?php

namespace App\Http\Controllers\Web;

use App\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    private $validationRules = [
        'body' => 'required',
        'subject' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Mail::orderBy('title', 'asc')->get();
        return view('mails.index', compact('mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        $mail = Mail::create($request->all());

        flash('Successfully created mail');
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        return view('mails.show', compact('mail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        return view('mails.edit', compact('mail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        $request->validate($this->validationRules);
        $mail->update($request->all());

        $file = app('view.finder')->find($mail->view);
        file_put_contents($file, $mail->body);

        flash('Successfully updated mail');
        return redirect()->route('mails.show', $mail->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        $mail->delete();
        flash('Successfully deleted mail');
        return back();
    }
}
