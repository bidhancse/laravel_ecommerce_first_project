<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class categorycontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    //////////////Category Information Start///////////////


    public function category(){
        return view('admin.Category.category');
    }

    public function managecategory(){
     $data = DB::table('categoryinformation')
     ->leftjoin('users','users.id','categoryinformation.admin_id')
     ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
     ->select('categoryinformation.*','users.name','iteminformation.item_name')
     ->get();
     return view('admin.Category.managecategory', compact('data'));
 }


 public function categoryinsert(Request $c) {

    $id = IdGenerator::generate(['table' => 'categoryinformation', 'length' => 10, 'prefix' =>'CAT-']);

    $data = array(
        'id'        => $id,
        'sl'        => $c->sl,
        'item_id' => $c->item_id,
        'category_name' => $c->category_name,
        'status'    => $c->status,
        'admin_id'  => Auth()->user()->id,
    );

    $newimage = $c->file('image');

    if ($newimage) {
        $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
        Image::make($newimage)->save('public/image/categoryimage/'.$image_one_name,80);
        $data['image']='public/image/categoryimage/'.$image_one_name;
        DB::table('categoryinformation')->insert($data);

    }

    else{
        DB::table('categoryinformation')->insert($data);
    }

    $notification=array(
        'messege'=>'Category Added Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

}


public function inactivecategory($id){

    DB::table('categoryinformation')->where('id',$id)->update(['status' => 0]);
    $notification=array(
        'messege'=>'Category Inactive Successfully',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 

}



public function activecategory($id){

    DB::table('categoryinformation')->where('id',$id)->update(['status' => 1]);
    $notification=array(
        'messege'=>'Category Active Successfully',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 

}


public function deletecategory($id){
    $check = DB::table('categoryinformation')->where('id',$id)->first();
    if (isset($check->image)) {
        unlink($check->image);
        DB::table('categoryinformation')->where('id',$id)->delete();
    }

    else{
        DB::table('categoryinformation')->where('id',$id)->delete();
    }

    $notification=array(
        'messege'=>'Category Delete Successfully',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 
}


public function categoryedit($id) {
    $data = DB::table('categoryinformation')->where('categoryinformation.id',$id)
    ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
    ->select('categoryinformation.*','iteminformation.item_name')->first();

    return view('admin.Category.editcategory', compact('data'));
}


public function categoryupdate(Request $e, $id) {

    $data = array(
        'sl'        => $e->sl,
        'item_id' => $e->item_id,
        'category_name' => $e->category_name,
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
        Image::make($newimage)->save('public/categoryimage/'.$image_one_name,80);
        $data['image']='public/categoryimage/'.$image_one_name;
        DB::table('categoryinformation')->where('id',$id)->update($data);

    }

    else{
        DB::table('categoryinformation')->where('id',$id)->update($data);

    }

    $notification=array(
        'messege'=>'Category Update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
}


//////////////Category Information End///////////////


public function subcategory(){
    $item = DB::table('iteminformation')->where('status',1)->get();
    $category = DB::table('categoryinformation')->where('status',1)->get();
    return view('admin.Category.subcategory', compact('item','category'));
}


public function subcategoryinsert(Request $s) {

    $id = IdGenerator::generate(['table' => 'subcategoryinformation', 'length' => 12, 'prefix' =>'SUBC-']);

    $data = array(
        'id'        => $id,
        'sl'        => $s->sl,
        'item_id' => $s->item_id,
        'category_id' => $s->category_id,
        'subcategory_name' => $s->subcategory_name,
        'status'    => $s->status,
        'admin_id'  => Auth()->user()->id,
    );

    $newimage = $s->file('image');

    if ($newimage) {
        $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
        Image::make($newimage)->save('public/subcategoryimage/'.$image_one_name,80);
        $data['image']='public/subcategoryimage/'.$image_one_name;
        DB::table('subcategoryinformation')->insert($data);

    }

    else{
        DB::table('subcategoryinformation')->insert($data);
    }

    $notification=array(
        'messege'=>'SubCategory Added Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

}


public function managesubcategory(){
 $data = DB::table('subcategoryinformation')
 ->leftjoin('users','users.id','subcategoryinformation.admin_id')
 ->leftjoin('iteminformation','iteminformation.id','subcategoryinformation.item_id')
 ->leftjoin('categoryinformation','categoryinformation.id','subcategoryinformation.category_id')
 ->select('subcategoryinformation.*','users.name','iteminformation.item_name','categoryinformation.category_name')
 ->get();
 return view('admin.Category.managesubcategory', compact('data'));
}


public function inactivesubcategory($id){

    DB::table('subcategoryinformation')->where('id',$id)->update(['status' => 0]);
    $notification=array(
        'messege'=>'SubCategory Inactive Successfully',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 

}



public function activesubcategory($id){

    DB::table('subcategoryinformation')->where('id',$id)->update(['status' => 1]);
    $notification=array(
        'messege'=>'SubCategory Active Successfully',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 

}


public function deletesubcategory($id){
    $check = DB::table('subcategoryinformation')->where('id',$id)->first();
    if (isset($check->image)) {
        unlink($check->image);
        DB::table('subcategoryinformation')->where('id',$id)->delete();
    }

    else{
        DB::table('subcategoryinformation')->where('id',$id)->delete();
    }

    $notification=array(
        'messege'=>'SubCategory Delete Successfully',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 
}


public function subcategoryedit($id) {
    $item = DB::table('iteminformation')->where('status',1)->get();
    $category = DB::table('categoryinformation')->where('status',1)->get();


    $data = DB::table('subcategoryinformation')->where('subcategoryinformation.id',$id)
    ->leftjoin('iteminformation','iteminformation.id','subcategoryinformation.item_id')
    ->leftjoin('categoryinformation','categoryinformation.id','subcategoryinformation.category_id')
    ->select('subcategoryinformation.*','iteminformation.item_name','category_name')
    ->first();

    return view('admin.Category.editsubcategory', compact('data','item','category'));
}


public function subcategoryupdate(Request $u, $id) {

    $data = array(
        'id'               => $id,
        'sl'               => $u->sl,
        'item_id'          => $u->item_id,
        'category_id'      => $u->category_id,
        'subcategory_name' => $u->subcategory_name,
        'status'           => $u->status,
        'admin_id'         => Auth()->user()->id,
    );

    $newimage = $u->file('image');

    $old_image = $u->old_image;
    if ($newimage) {
        if ($old_image) {
            unlink($old_image);
        }
        $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
        Image::make($newimage)->save('public/subcategoryimage/'.$image_one_name,80);
        $data['image']='public/subcategoryimage/'.$image_one_name;
        DB::table('subcategoryinformation')->where('id',$id)->update($data);

    }

    else{
        DB::table('subcategoryinformation')->where('id',$id)->update($data);

    }

    $notification=array(
        'messege'=>'SubCategory Update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
}




}
