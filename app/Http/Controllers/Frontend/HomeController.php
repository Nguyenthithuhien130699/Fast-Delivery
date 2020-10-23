<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.index');
    }
   
}
