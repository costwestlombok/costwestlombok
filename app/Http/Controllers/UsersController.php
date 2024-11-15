<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //
        return view('user.login');
    }

    public function update(Request $request, User $user)
    {
        $r = $request->all();
        if ($request->password) {
            $r['password'] = Hash::make($request->password);
        } else {
            unset($r['password']);
        }
        $user->update($r);
        Session::put('success', trans('labels.updated'));

        return back();
    }
}
