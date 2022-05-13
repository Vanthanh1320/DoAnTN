<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployerController extends Controller
{
    public function index(){
        if (Auth::check()){
            $post=Recruitment::where('user_id',Auth::id())->get();
//            dd($post);
            return view('employer.index')->with(compact('post'));

        }

        return redirect()->route('show-login-emp');
    }

    public function showAccount(){
        $account_id=Auth::user()->id;
        $account=User::find($account_id);
//        dd($account);
        return view('employer.account')->with(compact('account'));
    }

    public function account(Request $request){

        $data=$request->validate(
            [
                'name' => [''],
                'image' => [''],
                'company' => [''],
                'website' => [''],
                'address' => [''],
                'phone_number' => [''],

            ],
            [
                'name.required'=> 'Vui lòng nhập họ tên',
                'file.file'=> 'Đây không phải là file',
                'file.lt'=> 'Dung lượng file phải ít 1 MB',
                'company.required'=> 'Vui lòng nhập tên công ty',
                'website.required'=> 'Vui lòng nhập địa chỉ website',
                'address.required'=> 'Vui lòng nhập địa chỉ',
                'phone_number.required'=> 'Vui lòng nhập số điện thoại',

            ]);

        $account_id=Auth::user()->id;
        $account=User::find($account_id);

        $account->name=$data['name'];
        $account->company=$data['company'];
        $account->website=$data['website'];
        $account->phone_number=$data['phone_number'];
        $account->address=$data['address'];

        $get_image=$request->image;

        if ($get_image != null){
            $path='empl/img/';
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

}
