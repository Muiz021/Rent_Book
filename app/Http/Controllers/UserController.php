<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $rentLogs = RentLogs::with(['user','book'])->where('user_id', Auth::user()->id)->get();
        return view('profile',compact('rentLogs'));
    }

    public function index()
    {
        $users = User::where(['status' => 'active','role_id' => 2])->get();
        return view('user.user',compact('users'));
    }

    public function registeredUser()
    {
        $registeredUser = User::where(['status' => 'inactive', 'role_id' => 2])->get();
        return view('user.registered',compact('registeredUser'));
    }

    public function show($slug)
    {
        $users = User::where('slug', $slug)->first();
        $rentLogs = RentLogs::with(['user','book'])->where('user_id', $users->id)->get();
        return view('user.detail',compact('users', 'rentLogs'));
    }

    public function approve($slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->status = 'active';
        $users->save();
        return redirect('user-detail/'.$users->slug)->with('status','User Approved Successfully');
    }

    public function delete($slug)
    {
        $users = User::where('slug', $slug)->first();
        return view('user.delete',compact('users'));
    }

    public function destroy($slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->delete();
        return redirect('users')->with('status','User Deleted Successfully');
    }

    public function deletedUser()
    {
        $users = User::onlyTrashed()->get();
        return view('user.delete-list',compact('users'));
    }

    public function restore($slug)
    {
        $users = User::withTrashed()->where('slug', $slug)->first();
        $users->restore();
        return redirect('users')->with('status','User Restored Successfully');
    }
}

