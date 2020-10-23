<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $customers = User::where('role','customer')->count();
        $staffs = User::where('role','staff')->count();
        $params['status']  = 'new';
        $data = $this->getBill($params);
        $new_bills = $data->count();

        if (auth()->user()->role == 'staff'){
            $params['staff_id'] = auth()->id();
        }
       
    }

}
