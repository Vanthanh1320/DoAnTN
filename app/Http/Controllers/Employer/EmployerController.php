<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployerController extends Controller
{
    public function index(){
        if (Auth::check()){
            return view('employer.index');

        }

        return redirect()->route('show-login-emp');

    }
}
