<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class orderinformationcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orderinfomation(){
        $adddata=DB::table('invoice')->get();
        return view('admin.orderinformation.orderinformation',compact('adddata'));
    }

    public function pendingorder(){
        $adddata=DB::table('invoice')->where('status',0)->get();
        return view('admin.orderinformation.pendingorder',compact('adddata'));
    }

    public function processingorder(){
        $adddata=DB::table('invoice')->where('status',1)->get();
        return view('admin.orderinformation.processingorder',compact('adddata'));
    }

    public function shippingorder(){
        $adddata=DB::table('invoice')->where('status',2)->get();
        return view('admin.orderinformation.shippingorder',compact('adddata'));
    }

    public function completdorder(){
        $adddata=DB::table('invoice')->where('status',3)->get();
        return view('admin.orderinformation.completdorder',compact('adddata'));
    }
    

    public function update(Request $Req, $id)
    {
      DB::table('invoice')->where('id',$id)->update(['status'=>$Req->status]);

      $notification=array(
        'messege'    =>'Order Status Change Successfully',
        'alert-type' =>'success'
    );
      return redirect()->back()->with($notification);
  }

}
