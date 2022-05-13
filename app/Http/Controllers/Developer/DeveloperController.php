<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DeveloperController extends Controller
{
    public function index(){
        $posts=Recruitment::with('user')->where('status',1)->get();


        return view('developer.index')->with(compact('posts'));
    }

    public function showAccount(){
        $account_id=Auth::user()->id;
        $account=User::find($account_id);

        return view('developer.account')->with(compact('account'));
    }

    public function account(Request $request){
        $data=$request->validate(
            [
                'name' => [''],
                'image' => [''],
            ],
            [
                'name.required'=> 'Vui lòng nhập họ tên',
                'file.file'=> 'Đây không phải là file',
                'file.lt'=> 'Dung lượng file phải ít 1 MB',
            ]);

        $account_id=Auth::user()->id;
        $account=User::find($account_id);

        $account->name=$data['name'];

        $get_image=$request->image;
        $path='img/account/';

        if ($get_image){
            if (file_exists($path.$account->image)){
                unlink($path.$account->image);
            }

            $get_name_image=$get_image->getClientOriginalName();

            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $account->image=$new_image;
        }else{
            $account->image=$account->image;
        }


        $account->save();

        return redirect()->back()->with('success','Cập nhập thành công');
    }

    public function post_info($slug){
        $post=Recruitment::with('user')->where('slug_title',$slug)->first();
        $kills=explode(',',$post->kills);

        return view('developer.post_info')->with(compact('post','kills'));
    }
}
