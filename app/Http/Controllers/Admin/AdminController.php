<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\noticeWithAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user(){
        return User::find(Auth::id());
    }

    public function index(){
        if (Auth::check()){
            $user=$this->user();

            return view('admin.index')->with(compact('user'));
        }

        return redirect()->route('show-login-admin');

    }

    public function showUserDeveloper(){
        $users_developer=User::where('account_type',2)->paginate(5);
        $user=$this->user();

        return view('admin.user-developer')->with(compact('users_developer','user'));
    }

    public function showUserEmployer(){
        $users_employer=User::where('account_type',3)->paginate(5);
        $user=$this->user();

        return view('admin.user-employer')->with(compact('users_employer','user'));
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

    public function showPostNotice(){
        $user=$this->user();
        return view('admin.post-notice')->with(compact('user'));
    }

    public function createNotice(Request $request){
        $nameNotice=$request->name;
        $contents=$request->contents;
        $account_type=$request->account_type;

        $users=User::select('id')->where('account_type',$account_type)->get();

        Notification::send($users,new noticeWithAdmin($nameNotice,$contents));

        return redirect()->back()->with('success','Đăng thông báo thành công');
    }
}
