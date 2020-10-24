<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(){
        $data = City::with(['wards','districts'])->orderBy('name')->get();
        $districts = District::count();
        $wards = Ward::count();
        return view('backend.province.index',compact('data','districts','wards'));
    }
    //edit province
    public function edit($id){
        $info = City::findOrFail($id);
        $data = District::with(['wards','province'])->where('province_id',$id)->orderBy('name')->get();
        return view('backend.province.edit',compact('info','data'));
    }
  
    //update province
    public function update(Request $request,$id){

        $info = City::findOrFail($id);
        $name = $request->get('name');
        $code = $request->get('code');

        $checkNAme = City::where('name',$name)->where('id','!=',$id)->count();
        if ($checkNAme > 0){
            return back()->with('error','Tên thành phố đã tồn tại');
        }

        $checkCode = City::where('code',$code)->where('id','!=',$id)->count();
        if ($checkCode > 0){
            return back()->with('error','Mã thành phố đã tồn tại');
        }
        $info->name = $name;
        $info->code = $code;
        if ($info->save()){
            return back()->with('success','Sửa thành công');
        }else{
            return back()->with('error','Sửa thất bại');
        }
    }


        //delete 
        public function delete($id){
            $info = City::findOrFail($id);
            $info->delete();
            return back()->with('success','Xóa thành công');
        }
        public function districtDelete($id){
            $info = District::findOrFail($id);
            $info->delete();
            return back()->with('success','Xóa thành công');
        }
        public function wardDelete($id){
            $info = Ward::findOrFail($id);
            $info->delete();
            return back()->with('success','Xóa thành công');
        }
    //create province
    public function create(Request $request){
        $create = City::create([
            'name' => $request->get('name'),
            'code' => $request->get('code')
        ]);
        if ($create){
            return back()->with('success','Tạo thành công');
        }else{
            return back()->with('error','Tạo thất bại');
        }
    }
}
