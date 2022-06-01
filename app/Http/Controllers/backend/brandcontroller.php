<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class brandcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    








//////////////Brand Information Start///////////////


    public function brand(){
        return view('admin.Brand.brand');
    }

    public function managebrand(){
        $data = DB::table('brandinformation')
        ->leftjoin('users','users.id','brandinformation.admin_id')
        ->select('brandinformation.*','users.name')
        ->get();
        return view('admin.Brand.managebrand', compact('data'));
    }


    public function brandinsert(Request $b) {

        $id = IdGenerator::generate(['table' => 'brandinformation', 'length' => 11, 'prefix' =>'BRAND-']);

        $data = array(
            'id' => $id,
            'sl' => $b->sl,
            'brand_name' => $b->brand_name,
            'status' => $b->status,
            'admin_id' => Auth()->user()->id,
        );

        $newimage = $b->file('image');

        if ($newimage) {
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/brandimage/'.$image_one_name,80);
            $data['image']='public/brandimage/'.$image_one_name;
            DB::table('brandinformation')->insert($data);
        }

        else {
            DB::table('brandinformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Brand Insert Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



    public function inactivebrand($id){

        DB::table('brandinformation')->where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Brand Inactive Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 

    }


    public function activebrand($id){

        DB::table('brandinformation')->where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Brand Active Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 

    }


    public function branddelete($id) {

        $check = DB::table('brandinformation')->where('id',$id)->first();
        if (isset($check->image)) {
            unlink($check->image);
            DB::table('brandinformation')->where('id',$id)->delete();
        }

        else {
            DB::table('brandinformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Brand Delete Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 
    }


    public function brandedit($id) {
        $data = DB::table('brandinformation')->where('id',$id)->first();
        return view('admin.brand.editbrand', compact('data'));
    }


    public function brandupdate(Request $e, $id) {

        $data = array(
            'sl'        => $e->sl,
            'brand_name' => $e->brand_name,
            'status'    => $e->status,
            'admin_id'  => Auth()->user()->id,
        );



        $newimage = $e->file('image');

        $old_image = $e->old_image;
        if ($newimage) {
            if ($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/brandimage/'.$image_one_name,80);
            $data['image']='public/brandimage/'.$image_one_name;
            DB::table('brandinformation')->where('id',$id)->update($data);

        }

        else{
            DB::table('brandinformation')->where('id',$id)->update($data);
        }


        $notification=array(
            'messege'=>'Brand Update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


//////////////Brand Information End///////////////

    

    
}
