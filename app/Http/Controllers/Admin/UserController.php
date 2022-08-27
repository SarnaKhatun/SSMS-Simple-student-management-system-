<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected static $user;
    protected static $userDetails;


    public function index()
    {
        return view('admin.user.manage', [
            'users' => User::latest()->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users'
        ]);

        User::saveUserData($request);
        return redirect()->back()->with('message', 'User created successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit', [
            'user' => User::where('id', $id)->first(),
        ]);
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
        User::saveUserData($request, $id);
        return redirect(route('users.index'))->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        self::$userDetails = UserDetail::find($id)->delete();
//        self::$user = User::where('id', $id)->delete();

        self::$userDetails = UserDetail::find($id);
        self::$userDetails->delete();
        self::$user = User::find($id);
        self::$user->delete();
        return back()->with('message', 'User deleted successfully');
    }


    public function UsersChangeStatus($id)
    {
        $userDetails = UserDetail::where('user_id', $id)->first();

        if ( $userDetails->status == 0 )
        {
            $userDetails->status = 1;
        }
        elseif ( $userDetails->status == 1 )
        {
            $userDetails->status = 0;
        }

        $userDetails->save();
        return back()->with('message', 'User status changed successfully');

    }

    public function editProfile()
    {
        return view('admin.profile.edit');
    }

    public function updateProfile (Request $request)
    {
        User::updateProfile($request);
        return back()->with('message', 'Profile updated successfully');
    }
}
