<?php

namespace App\Http\Controllers\backend;

use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use Hash;


class backcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createadmin(){
        return view('admin.user.createadmin');
    }

    public function manageadmin(){
        $data = DB::table('users')->where('is_admin',1)->get();
        return view('admin.user.manageadmin', compact('data'));
    }
    


    public function usercreate(Request $a) {


        $data = array(
            'name' => $a->name,
            'email' => $a->email,
            'phone' => $a->phone,
            'address' => $a->address,
            'password' =>Hash::make($a->password),
            'status' => 1,
            'is_admin' => 1,
            'admin_id' => Auth()->user()->id,
        );

        $newimage = $a->file('image');

        if ($newimage) {
            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/userimage/'.$image_one_name,80);
            $data['image']='public/userimage/'.$image_one_name;
            DB::table('users')->insert($data);
        }

        else {
            DB::table('users')->insert($data);
        }

        $notification=array(
            'messege'=>'User Add Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function inactiveadmin($id){

        DB::table('users')->where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'User Inactive Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 

    }


    public function activeadmin($id){

        DB::table('users')->where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'User Active Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 

    }


    public function admindelete($id) {

        $check = DB::table('users')->where('id',$id)->first();
        if (isset($check->image)) {
            unlink($check->image);
            DB::table('users')->where('id',$id)->delete();
        }

        else {
            DB::table('users')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Admin Delete Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 
    }


    public function adminedit($id) {
        $data = DB::table('users')->where('id',$id)->first();
        return view('admin.user.editcreateadmin', compact('data'));
    }

    public function usercreateupdate(Request $a, $id) {

        if($a->password == Null){
           $data = array(
            'name' => $a->name,
            'email' => $a->email,
            'phone' => $a->phone,
            'address' => $a->address,
            'status' => 1,
            'is_admin' => 1,
            'admin_id' => Auth()->user()->id,
        );
       }
       else{
          $data = array(
            'name' => $a->name,
            'email' => $a->email,
            'phone' => $a->phone,
            'address' => $a->address,
            'password' =>Hash::make($a->password),
            'status' => 1,
            'is_admin' => 1,
            'admin_id' => Auth()->user()->id,
        );

      }

      



      $newimage = $a->file('image');

      $old_image = $a->old_image;
      if ($newimage) {
        if ($old_image) {
            unlink($old_image);
        }
        $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
        Image::make($newimage)->save('public/userimage/'.$image_one_name,80);
        $data['image']='public/userimage/'.$image_one_name;
        DB::table('users')->where('id',$id)->update($data);

    }

    else{
        DB::table('users')->where('id',$id)->update($data);
    }


    $notification=array(
        'messege'=>'Admin Update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

}



//////////////About Information Start///////////////

public function about(){

    $data = DB::table('aboutinformation')->first();
    return view('admin.Website setting.about', compact('data'));
}


public function aboutupdate(Request $id, $edit) {

    $data = array(

        'details' => $id->details,
        'admin_id' => Auth()->user()->id,
    );


    DB::table('aboutinformation')->where('id',$edit)->update($data);

    $notification=array(
        'messege'=>'About update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

}


//////////////About Information End///////////////


//////////////Contact Information Start///////////////

public function contact(){
    $id = '1';
    $data = DB::table('contactinformation')->where('id',$id)->first();
    return view('admin.Website setting.contact', compact('data'));
}


public function contactupdate(Request $c, $id) {

    $data = array(
        'details' => $c->details,
        'admin_id' => Auth()->user()->id,
    );

    if(isset($data)) {
        DB::table('contactinformation')->where('id',$id)->update($data);
    }

    $notification=array(
        'messege'=>'contact update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

}


//////////////Contact Information End///////////////


//////////////Privacy & Policy Information Start///////////////

public function privacypolicy(){
    $id = '1';
    $data = DB::table('privacypolicy')->where('id',$id)->first();
    return view('admin.Website setting.privacypolicy', compact('data'));
}

public function updateprivacypolicy(Request $p, $id) {

    $data = array(
        'details' => $p->details,
        'admin_id' => Auth()->user()->id,
    );

    if(isset($data)) {
        DB::table('privacypolicy')->where('id',$id)->update($data);
    }

    $notification=array(
        'messege'=>'Privacy & Policy update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

}

//////////////Privacy & Policy Information End///////////////


//////////////Term & Condition Information Start///////////////
public function termcondition(){
    $id = '1';
    $data = DB::table('termcondition')->where('id',$id)->first();
    return view('admin.Website setting.termcondition', compact('data'));
}

public function termconditionupdate(Request $t, $id) {

    $data = array(
        'details' => $t->details,
        'admin_id' => Auth()->user()->id,
    );

    if(isset($data)) {
        DB::table('termcondition')->where('id',$id)->update($data);
    }

    $notification=array(
        'messege'=>'Term & Condition update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

}

//////////////Term & Condition Information End///////////////


//////////////How to Buy Information Start///////////////

public function howtobuy(){
    $id = '1';
    $data = DB::table('howtobuy')->where('id',$id)->first();
    return view('admin.Website setting.howtobuy', compact('data'));
}

public function howtobuyupdate(Request $h, $id) {

    $data = array(
        'details' => $h->details,
        'admin_id' => Auth()->user()->id,
    );

    if(isset($data)) {
        DB::table('howtobuy')->where('id',$id)->update($data);
    }

    $notification=array(
        'messege'=>'How to Buy update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

}

//////////////How to Buy Information End///////////////


//////////////Faq Information Start///////////////

public function faq(){
    return view('admin.Website setting.faq');
}

public function managefaq(){
    $data = DB::table('faq')
    ->leftjoin('users','users.id','faq.admin_id')
    ->select('faq.*','users.name')
    ->get();
    return view('admin.Website setting.managefaq', compact('data'));
}


public function faqinsert(Request $id) {

    $data = array(
        'question'        => $id->question,
        'details' => $id->details,
        'admin_id'  => Auth()->user()->id,
    );

    DB::table('faq')->where('id',$id)->insert($data);


    $notification=array(
        'messege'=>'FAQ Added Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

}

public function deletefaq($id) {

    DB::table('faq')->where('id',$id)->delete();

    $notification=array(
        'messege'=>'FAQ Delete Successfully',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification);
}

public function editfaq($id) {
    $data = DB::table('faq')->where('id',$id)->first();
    return view('admin.Website setting.editfaq', compact('data'));
}


public function faqupdate(Request $id, $update) {

    $data = array(
        'question'        => $id->question,
        'details' => $id->details,
        'admin_id'  => Auth()->user()->id,
    );

    DB::table('faq')->where('id',$update)->update($data);


    $notification=array(
        'messege'=>'FAQ Update Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

}

//////////////Faq Information End///////////////

  public function customermessage()
    {
         $CustomerMessage=DB::table('customermessage')->get();
        return view('admin.Customer.customermessage',compact('CustomerMessage'));
    }



}


