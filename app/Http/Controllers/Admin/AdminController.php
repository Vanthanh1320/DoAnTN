<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $user=User::find(Auth::id());
//        dd($user->notifications);
        return view('admin.index')->with(compact('user'));
    }

    public function showUserDeveloper(){
        $users_developer=User::where('account_type',2)->paginate(1);

        return view('admin.user-developer')->with(compact('users_developer'));
    }

    public function showUserEmployer(){
        $users_employer=User::where('account_type',3)->paginate(5);

        return view('admin.user-employer')->with(compact('users_employer'));
    }

    public function updateStatus(Request $request){
        $user=User::find($request->id);
        $user->status=$request->value;

        $user->save();
        return response()->json(['success']);
    }

    public function infoUserEmployer(Request $request){
        $user=User::find($request->id);

        return view('admin.info-user-employer')->with(compact('user'));
    }
}
