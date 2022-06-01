<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;


class slidercontroller extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }
    

//////////////Slider Information Start///////////////


    public function slider(){
        return view('admin.Website setting.slider');
    }

    public function manageslider(){
        $data = DB::table('sliderinformation')->get();
        return view('admin.Website setting.manageslider', compact('data'));
    }


    public function sliderinsert(Request $s) {

        $id = IdGenerator::generate(['table' => 'sliderinformation', 'length' => 12, 'prefix' =>'SLIDER-']);

        $data = array(
            'id' => $id,
            'title' => $s->title,
            'url' => $s->url,
            'admin_id' => Auth()->user()->id,
        );

        $newimage = $s->file('image');

        if ($newimage) {
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/sliderimage/'.$image_one_name,80);
            $data['image']='public/sliderimage/'.$image_one_name;
            DB::table('sliderinformation')->insert($data);
        }

        else {
            DB::table('sliderinformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Slider Add Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function deleteslider($id) {

        $check = DB::table('sliderinformation')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);
            DB::table('sliderinformation')->where('id',$id)->delete();
        }

        else {
            DB::table('sliderinformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Slider Delete Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


    public function editslider($id) {
        $data = DB::table('sliderinformation')->where('id',$id)->first();
        return view('admin.Website setting.editslider', compact('data'));
    }



    public function sliderupdate(Request $u, $id) {

        $data = array(

            'title' => $u->title,
            'url' => $u->url,
            'admin_id' => Auth()->user()->id,
        );



        $newimage = $u->file('image');

        $old_image = $u->old_image;
        if ($newimage) {
            if ($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/sliderimage/'.$image_one_name,80);
            $data['image']='public/sliderimage/'.$image_one_name;
            DB::table('sliderinformation')->where('id',$id)->update($data);

        }

        else{
            DB::table('sliderinformation')->where('id',$id)->update($data);
        }


        $notification=array(
            'messege'=>'Slider update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }



//////////////Slider Information End///////////////



}
