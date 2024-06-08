<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //function for authentication navigation
    //this controller manage user navigations for admin and other users
    //keep this secure and you can add more users and user levels based on the role of system
    public function index(){
        if (Auth::user() -> userrole == 'user') {
            return view('user.home');
        }elseif (Auth::user() -> userrole == 'pharmacist') {
            return view('pharmacy.prescription');
        }else{
            return view('error');
        }
    }
}
