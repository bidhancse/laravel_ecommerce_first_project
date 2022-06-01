<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class productcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


//////////////Product Information Start///////////////


    public function product(){
        $item = DB::table('iteminformation')->where('status',1)->get();
        $category = DB::table('categoryinformation')->where('status',1)->get();
        $brand = DB::table('brandinformation')->where('status',1)->get();
        return view('admin.Product.product', compact('item','brand','category'));
    }

    public function categoryget($item_id) {

        $data = DB::table('categoryinformation')->where('item_id',$item_id)->get();
        return json_encode($data);
    }

        public function subcategoryget($category_id) {

        $data = DB::table('subcategoryinformation')->where('category_id',$category_id)->get();
        return json_encode($data);
    }



    public function manageproduct(){
        $data = DB::table('productinformation')
        ->leftjoin('iteminformation','iteminformation.id','productinformation.item_id')
        ->leftjoin('brandinformation','brandinformation.id','productinformation.brand_id')
        ->select('productinformation.*','iteminformation.item_name','brandinformation.brand_name')
        ->get();
        return view('admin.Product.manageproduct', compact('data'));
    }


    public function productinsert(Request $p) {

        $data = array(
            'product_code'       =>   $p->product_code,
            'product_name'       =>   $p->product_name,
            'item_id'            =>   $p->item_id,
            'category_id'        =>   $p->category_id,
            'subcategory_id'     =>   $p->subcategory_id,
            'brand_id'           =>   $p->brand_id,
            'purchase_price'     =>   $p->purchase_price,
            'sale_price'         =>   $p->sale_price,
            'discount_price'     =>   $p->discount_price,
            'quentity'           =>   $p->quentity,
            'measurement_type'   =>   $p->measurement_type,
            'short_details'      =>   $p->short_details,
            'full_details'       =>   $p->full_details,
            'product_size'       =>   $p->product_size,
            'product_color'      =>   $p->product_color,
            'stock_status'       =>   $p->stock_status,
            'status'             =>   $p->status,
            'admin_id'           =>   Auth()->user()->id,
        );

        $newimage = $p->file('image');

        if ($newimage) {
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/productimage/'.$image_one_name,80);
            $data['image']='public/productimage/'.$image_one_name;
            DB::table('productinformation')->insert($data);
        }

        else {
            DB::table('productinformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Product Add Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function inactiveproduct($id) {
        DB::table('productinformation')->where('id',$id)->update(['status' => 0]);

        $notification=array(
            'messege'=>'Product Inactive Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function activeproduct($id) {
        DB::table('productinformation')->where('id',$id)->update(['status' => 1]);

        $notification=array(
            'messege'=>'Product Active Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }


    public function inactivestockstatus($id) {
        DB::table('productinformation')->where('id',$id)->update(['stock_status' => 0]);

        $notification=array(
            'messege'=>'Stock Status Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function activestockstatus($id) {
        DB::table('productinformation')->where('id',$id)->update(['stock_status' => 1]);

        $notification=array(
            'messege'=>'Stock Status Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }



    public function deleteproduct($id) {

        $check = DB::table('productinformation')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);
            DB::table('productinformation')->where('id',$id)->delete();
        }

        else {
            DB::table('productinformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Product Delete Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


    public function editproduct($id) {
        $item = DB::table('iteminformation')->where('status',1)->get();
        $category = DB::table('categoryinformation')->where('status',1)->get();
        $subcategory = DB::table('subcategoryinformation')->where('status',1)->get();
        $brand = DB::table('brandinformation')->where('status',1)->get();


        $data = DB::table('productinformation')->where('productinformation.id',$id)
        ->leftjoin('iteminformation','iteminformation.id','productinformation.item_id')
        ->leftjoin('categoryinformation','categoryinformation.id','productinformation.category_id')
        ->leftjoin('subcategoryinformation','subcategoryinformation.id','productinformation.subcategory_id')
        ->leftjoin('brandinformation','brandinformation.id','productinformation.brand_id')
        ->select('productinformation.*','iteminformation.item_name','brandinformation.brand_name','category_name')
        ->first();
        return view('admin.product.editproduct', compact('data','item','brand','category','subcategory'));
    }


    public function productupdate(Request $u, $id) {

        $data = array(
            'product_code'           =>   $u->product_code,
            'product_name'       =>   $u->product_name,
            'item_id'            =>   $u->item_id,
            'category_id'        =>   $u->category_id,
            'subcategory_id'     =>   $u->subcategory_id,
            'brand_id'           =>   $u->brand_id,
            'purchase_price'     =>   $u->purchase_price,
            'sale_price'         =>   $u->sale_price,
            'discount_price'     =>   $u->discount_price,
            'quentity'           =>   $u->quentity,
            'measurement_type'   =>   $u->measurement_type,
            'short_details'      =>   $u->short_details,
            'full_details'       =>   $u->full_details,
            'product_size'       =>   $u->product_size,
            'product_color'      =>   $u->product_color,
            'stock_status'       =>   $u->stock_status,
            'status'             =>   $u->status,
            'admin_id'           =>   Auth()->user()->id,
        );

        $newimage = $u->file('image');

        $old_image = $u->old_image;
        if ($newimage) {
            if ($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/productimage/'.$image_one_name,80);
            $data['image']='public/productimage/'.$image_one_name;
            DB::table('productinformation')->where('id',$id)->update($data);

        }

        else{
            DB::table('productinformation')->where('id',$id)->update($data);

        }

        $notification=array(
            'messege'=>'Product Update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function viewallproduct(){
        $data = DB::table('productinformation')
        ->leftjoin('iteminformation','iteminformation.id','productinformation.item_id')
        ->leftjoin('categoryinformation','categoryinformation.id','productinformation.category_id')
        ->leftjoin('subcategoryinformation','subcategoryinformation.id','productinformation.subcategory_id')
        ->leftjoin('brandinformation','brandinformation.id','productinformation.brand_id')
        ->select('productinformation.*','iteminformation.item_name','brandinformation.brand_name','category_name','subcategory_name')
        ->get();
        return view('admin.Product.viewallproduct', compact('data'));
    }



//////////////Product Information End///////////////


}
