<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormRegister(){
        return view('employer.register');
    }

    public function showFormLogin(){
        return view('employer.login');
    }

    public function login(Request $request){

        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' =>  'required|min:8',
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email sai định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min'      =>  'Mật khẩu phải từ :min ký tự',
            ]
        );

        if(Auth::attempt($credentials)) {
//            if(Auth::user()->account_type == 2){
//                $request->session()->flush();
//                return redirect()->back()->with('error','Địa chỉ email không tồn tại');
//            }
            return redirect()->route('empl');
        }

        return redirect()->back()->with('error','Email hoặc mật khẩu không chính xác');
    }

    public function register(Request $request){
        $data=$request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required','email','unique:users'],
                'password' =>  ['required','min:8'],
                'phone_number' => ['required','numeric','min:11'],
                'company' => ['required','string'],
                'website' => ['required','string'],
                'address' => ['required','string'],
                'status' => ['required'],
                'account_type' => ['required'],
            ],
            [
                'name.required'=> 'Vui lòng nhập họ tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email sai định dạng',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min'      =>  'Mật khẩu phải từ :min ký tự',
                'company.required'=> 'Vui lòng nhập tên công ty',
                'phone_number.required'=> 'Vui lòng nhập số điện thoại',
                'phone_number.numeric'=> 'Số điện thoại định dạng là số',
                'phone_number.min'=> 'Số điện thoại ít nhất là 10 ký tự',
                'website.required'=> 'Vui lòng nhập website',
                'address.required'=> 'Vui lòng nhập địa chỉ',
            ]
        );

        $user=new User();
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=bcrypt($data['password']);
        $user->company=$data['company'];
        $user->phone_number=$data['phone_number'];
        $user->website=$data['website'];
        $user->address=$data['address'];
        $user->account_type=$data['account_type'];
        $user->status=$data['status'];

        $user->save();

        if(Auth::attempt($data)) {
            return redirect()->route('empl');
        }

        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('show-login-emp');
    }

}
