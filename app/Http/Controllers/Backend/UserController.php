<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateAvatar;
use App\Http\Requests\UpdatePassword;
use App\Models\Bill;
use App\Models\Transport;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data = User::where('role','customer')->get();
        return view('backend.user.index',compact('data'));
    }
    public function staffList(){
        $data = User::where('role','staff')->get();
        $title = 'Danh Sách Shipper';
        return view('backend.user.index',compact('data','title'));
    }
    public function seller(){
        $data = User::where('role','seller')->get();
        $title = 'Danh Sách người bán hàng';
        return view('backend.user.index',compact('data','title'));
    }
    public function profile($id){
        $info = User::findorFail($id);
        $transports = Transport::all();
        return view('backend.user.profile',compact('info','transports'));
    }
    public function create(){
        return view('backend.user.create');
    }
   
}
