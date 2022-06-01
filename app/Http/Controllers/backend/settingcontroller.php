<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class settingcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



//////////////Setting Information Start///////////////

    public function setting(){
        $data = DB::table('settinginformation')->first();
        return view('admin.Website setting.setting', compact('data'));
    }


    public function updatesetting(Request $s, $id) {
        $data = array(
            'admin_id'  => Auth()->user()->id,
            'title'     => $s->title,
            'email'     => $s->email,
            'phone'     => $s->phone,
            'facebook'  => $s->facebook,
            'twitter'   => $s->twitter,
            'instagram' => $s->instagram,
            'youtube'   => $s->youtube,
        );

        $newimage = $s->file('image');
        $faviconimage = $s->file('favicon');

        $oldimage = DB::table('settinginformation')->first();


        if ($newimage) {

            if ($oldimage->image) {
                unlink($oldimage->image);
            }

            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/settingimage/'.$image_one_name,80);
            $data['image']='public/settingimage/'.$image_one_name;
            DB::table('settinginformation')->where('id',$id)->update($data);
        }
        else{
            DB::table('settinginformation')->where('id',$id)->update($data);
        }

        if ($faviconimage) {

            if ($oldimage->favicon) {
                unlink($oldimage->favicon);
            }


            $image_one_name= hexdec(uniqid()).'.'.$faviconimage->getClientOriginalExtension();
            Image::make($faviconimage)->save('public/settingimage/'.$image_one_name,80);
            $data['favicon']='public/settingimage/'.$image_one_name;
            DB::table('settinginformation')->where('id',$id)->update($data);
        }
        else{
            DB::table('settinginformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Setting update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }

//////////////Setting Information End///////////////


}
