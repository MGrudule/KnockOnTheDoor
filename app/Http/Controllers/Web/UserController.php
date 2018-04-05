<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Circle;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $validationRules = [
        'name' => 'required|string|max:255',
    ];

    public $pageSize = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('name')->paginate($request->size ?: $this->pageSize);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $circles = Circle::orderBy('title')->get();
        return view('users.create', compact('user', 'circles'));
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
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'circle_id' => $request->get('circle_id'),
        ]);

        $user->categories()->attach(
            Category::pluck('id')->all()
        );

        flash('Successfully created user');
        return $this->show($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $circles = Circle::orderBy('title')->get();
        return view('users.edit', compact('user', 'circles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate($this->validationRules);

        $update = [
            'name' => $request->get('name'),
            'circle_id' => $request->get('circle_id'),
        ];

        if ($request->get('email') != $user->email) {
            $request->validate(
                ['email' => 'required|string|email|max:255|unique:users'
            ]);
            $update['email'] = $request->get('email');
        }

        if ($request->get('password')) {
            if ($request->get('password') == $request->get('password_confirm')) {
                $update['password'] = Hash::make($request->get('password'));
            } else {
                flash('Passwords do not match')->error();
                return back();
            }
        }

        $user->update($update);
        flash('Successfully updated user');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash('Successfully deleted user');
        return back();
    }

    public function editImage(Request $request, User $user)
    {
        return view('test')->with([
            'image' => $user->imagePublicUrl(),
        ]);
    }

    public function updateImage(Request $request, User $user)
    {
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $user->storeImage($request->file('file'));
                flash('Successfully uploaded image');
            } else {
                flash('File is invalid')->error();
            }
        } else {
            flash('No file on request')->error();
        }
        return back();
    }
}
