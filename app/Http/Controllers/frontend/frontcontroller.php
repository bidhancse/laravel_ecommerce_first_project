<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Hash;

class frontcontroller extends Controller
{



    public function frontendmethod(){

        $itemshow = DB::table('iteminformation')->get();
        $slideractive = DB::table('sliderinformation')->orderBy('id','DESC')->first();
        $slidermore = DB::table('sliderinformation')->orderBy('id','DESC')->skip(1)->limit(4)->get();
        $itemname = DB::table('iteminformation')->limit(6)->inRandomOrder()->get();
        $brandshow = DB::table('brandinformation')->limit(23)->inRandomOrder()->get();
        

        return view ('user.home', compact('itemshow','slideractive','slidermore','itemname','brandshow'));
    }



    public function item($id){
        $item = DB::table('productinformation')->where('item_id',$id)->orderBy('id','DESC')->paginate(8);
        $itemname = DB::table('iteminformation')->where('id',$id)->first();
        $cateName = DB::table('categoryinformation')->where('item_id',$id)->get();
        return view ('user.item.item', compact('item','cateName','itemname'));
    }




    public function category($id){
        $category = DB::table('productinformation')->where('category_id',$id)->where('status',1)->orderBy('id','DESC')->paginate(8);
        $cateName = DB::table('categoryinformation')->where('categoryinformation.id',$id)
        ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
        ->select('categoryinformation.*','iteminformation.item_name')
        ->first();
        $subcateName = DB::table('subcategoryinformation')->where('category_id',$id)->get();
        return view ('user.category.category', compact('category','subcateName','cateName'));
    }




    public function subcategory($id){
        $subcategory = DB::table('productinformation')->where('subcategory_id',$id)->where('status',1)->orderBy('id','DESC')->paginate(8);
        $SubcateName = DB::table('subcategoryinformation')->where('subcategoryinformation.id',$id)
        ->leftjoin('iteminformation','iteminformation.id','subcategoryinformation.item_id')
        ->leftjoin('categoryinformation','categoryinformation.id','subcategoryinformation.category_id')
        ->select('subcategoryinformation.*','iteminformation.item_name','categoryinformation.category_name')
        ->first();
        return view ('user.subcategory.subcategory', compact('subcategory','SubcateName'));
    }




    public function product($id){
        $singleproduct = DB::table('productinformation')->where('id',$id)->first();
        $reletedproduct = DB::table('productinformation')->where('category_id',$singleproduct->category_id)->get();
        $productSize = explode(',',$singleproduct->product_size);
        $productColor = explode(',',$singleproduct->product_color);
        return view ('user.product.singleproductview', compact('singleproduct','reletedproduct','productSize','productColor'));
    }

    public function allproduct()
    {
        $allproduct = DB::table('productinformation')->where('status',1)->orderBy('id','DESC')->paginate(18);
        return view('user.product.allproduct',compact('allproduct'));
    }



    public function addtocart(Request $cart, $id)
    {
        $productData = DB::table('productinformation')->where('id',$id)->first();

        $sal_price = $productData->sale_price;
        $dis_price = $productData->discount_price;
        $present_price = $sal_price-$dis_price;

        $data = array();

        $data['id'] = $productData->id;
        $data['name'] = $productData->product_name;
        $data['qty'] = $cart->quentity;
        $data['weight'] = 0;
        $data['price'] = $present_price;
        $data['options']['sale_price'] = $sal_price;
        $data['options']['product_size'] = $cart->product_size;
        $data['options']['product_color'] = $cart->product_color;
        $data['options']['image'] = $productData->image;

        Cart::add($data);
        return redirect()->back();        

    }


    public function checkcart()
    {
        $cart =Cart::content();
        dd($cart);
    }


    public function dataremove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }


    public function dataallclear()
    {
        Cart::destroy();
        return redirect()->back();
    }


    public function register(Request $add)
    {
        $data = array(
            'name' => $add->name,
            'email' => $add->email, 
            'phone' => $add->phone,
            'password' => Hash::make($add->password),
            'address' => $add->address,
            'is_admin' => 0,
        );

        DB::table('users')->insert($data);

        $notification=array(
            'messege'=>'Register Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function checkout ()
    {
        return view('user.checkout.checkout');
    }



    public function qty_update(Request $req, $rowId)
    {
     Cart::update($rowId,$req->qty);
     return redirect()->back();
 }


 public function shipping_details(Request $req,$id){

    $Data = array(

        'name'           =>$req->name,
        'phone'          =>$req->phone,
        'email'          =>$req->email,
        'address'        =>$req->address,
        'district'       =>$req->district,
        'payment_method' =>$req->payment_method,
        'user_id'         =>$id,
        'status'         =>0,
        'order_date'     =>date('d-m-y'),
    );

    $shiping=DB::table('invoice')->insertGetId($Data);
    $contunt=Cart::content();

    $cart_data=array();
    foreach ($contunt as $prodata){
        $cart_data['invoice_id']=$shiping;
        $cart_data['product_id']=$prodata->id;
        $cart_data['qty']=$prodata->qty;
        $cart_data['size']=$prodata->options->product_size;
        $cart_data['color']=$prodata->options->product_color;
        $cart_data['price']=$prodata->price;
        $cart_data['total_price']=$prodata->subtotal;


        DB::table('orderdetails')->insert($cart_data);
    }


    Cart::destroy();
    $notification=array(
        'messege'    =>' Cart  Successfully',
        'alert-type' =>'success'
    );
    return redirect()->back()->with($notification);
   // return redirect('/')->with($notification);

}












public function brand($id){
    $brand = DB::table('productinformation')->where('brand_id',$id)->orderBy('id','DESC')->paginate(8);
    $brandname = DB::table('brandinformation')->where('id',$id)->first();
    return view ('user.brand.brand', compact('brand','brandname'));
}

public function brand_list(){
    $brandlist = DB::table('brandinformation')->inRandomOrder()->where('status',1)->get();
    return view ('user.brand.allbrand', compact('brandlist'));
}




public function serachproduct(Request $request){

    $search = $request->searchdata;
    $productsearch = DB::table('productinformation')
    ->where('product_name', 'like', '%' . $search . '%')
    ->where('status', 1)->orderBy('id','DESC')
    ->get();
    return view('user.serachproduct.searchproduct', compact('productsearch'));
}




public function aboutus(){
    $aboutshow = DB::table('aboutinformation')->first();
    return view ('user.about.about', compact('aboutshow'));
}




public function privacypolicy(){
    $privacypolicyshow = DB::table('privacypolicy')->first();
    return view ('user.privacypolicy.privacypolicy', compact('privacypolicyshow'));
}




public function termcondition(){
    $termconditionshow = DB::table('termcondition')->first();
    return view ('user.termcondition.termcondition', compact('termconditionshow'));
}



public function howtobuy(){
    $howtobuy = DB::table('howtobuy')->first();
    return view ('user.howtobuy.howtobuy', compact('howtobuy'));
}


public function faq(){
    $faq = DB::table('faq')->get();
    return view ('user.faq.faq', compact('faq'));
}




public function contactus(){
    $contactinfo = DB::table('settinginformation')->first();
    return view ('user.contact.contact', compact('contactinfo'));
}




}
