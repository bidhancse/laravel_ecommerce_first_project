<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class customercontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function customermsg(Request $req)
    {
        $data = array(
            'name' =>$req->name ,
            'email' =>$req->email ,
            'phone' =>$req->phone ,
            'message' =>$req->message ,
        );
        DB::table('customermessage')->insert($data);

        $notification=array(
            'messege'=>'Send Message Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }


  



    public function userdashboard()
    {
        $adddata=DB::table('invoice')->where('user_id',Auth()->user()->id)->get();
        $PandingOrder=DB::table('invoice')->where('user_id',Auth()->user()->id)->where('status',0)->get();
        $ProcessingOrder=DB::table('invoice')->where('user_id',Auth()->user()->id)->where('status',1)->get();
        $DeliveredOrder=DB::table('invoice')->where('user_id',Auth()->user()->id)->where('status',3)->get();
        return view ('user.user.userdashboard',compact('adddata','PandingOrder','ProcessingOrder','DeliveredOrder'));
    }

    public function allorder()
    {
        $adddata=DB::table('invoice')->where('user_id',Auth()->user()->id)->get();
        return view('user.user.allorder',compact('adddata'));
    }

    public function invoice($id)
    {
        $adddata=DB::table('invoice')->where('id',$id)->first();
        $data=DB::table('orderdetails')->where('orderdetails.invoice_id',$id)
        ->leftjoin('productinformation','productinformation.id','orderdetails.product_id')
        ->select('orderdetails.*','productinformation.product_name')
        ->get();
        return view('user.user.invoice',compact('adddata','data'));

    }
























    public function updateinformation()
    {
        return view ('user.user.updateinformation');
    }

    public function changepassword()
    {
        return view ('user.user.changepassword');
    }
    

    



}
