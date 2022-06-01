<?php

namespace App\Http\Controllers\backend;

use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class itemcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //////////////Item Information///////////////


    public function item(){
        return view('admin.Item.item');
    }

    
    public function manageitem(){
        $data = DB::table('iteminformation')
        ->leftjoin('users','users.id','iteminformation.admin_id')
        ->select('iteminformation.*','users.name')
        ->get();
        return view('admin.Item.manageitem', compact('data'));
    }


    public function iteminsert(Request $a){

        $id = IdGenerator::generate(['table' => 'iteminformation', 'length' => 10, 'prefix' =>'ITEM-']);

        $data = array(
            'id'        => $id,
            'sl'        => $a->sl,
            'item_name' => $a->item_name,
            'status'    => $a->status,
            'admin_id'  => Auth()->user()->id,
        );



        $newimage = $a->file('image');

        if ($newimage) {
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/itemimage/'.$image_one_name,80);
            $data['image']='public/itemimage/'.$image_one_name;
            DB::table('iteminformation')->insert($data);

        }

        else{
            DB::table('iteminformation')->insert($data);
        }



        $notification=array(
            'messege'=>'Item Added Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }
    


    public function inactiveitem($id){

        DB::table('iteminformation')->where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Item Inactive Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 

    }


    public function activeitem($id){

        DB::table('iteminformation')->where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Item Active Successfully',
            'alert-type'=>'info'
        );
        return Redirect()->back()->with($notification); 

    }



    public function deleteitem($id){
        $check = DB::table('iteminformation')->where('id',$id)->first();
        if (isset($check->image)) {
            unlink($check->image);
            DB::table('iteminformation')->where('id',$id)->delete();
        }

        else{
            DB::table('iteminformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Item Delete Successfully',
            'alert-type'=>'danger'
        );
        return Redirect()->back()->with($notification); 
    }



    public function edititem($id) {
        $data = DB::table('iteminformation')->where('id',$id)->first();
        return view('admin.item.edititem', compact('data'));
    }


    public function itemupdate(Request $s, $id) {

        $data = array(
            'sl'        => $s->sl,
            'item_name' => $s->item_name,
            'status'    => $s->status,
            'admin_id'  => Auth()->user()->id,
        );



        $newimage = $s->file('image');
        
        $old_image = $s->old_image;
        if ($newimage) {
            if ($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/itemimage/'.$image_one_name,80);
            $data['image']='public/itemimage/'.$image_one_name;
            DB::table('iteminformation')->where('id',$id)->update($data);

        }

        else{
            DB::table('iteminformation')->where('id',$id)->update($data);
        }


        $notification=array(
            'messege'=>'Item update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


//////////////Item Information END///////////////

    
}
