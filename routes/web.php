<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');



/////////////////// Frontend Start \\\\\\\\\\\\\\\\\\\\\

Route::get('/','frontend\frontcontroller@frontendmethod');
Route::get('item/{id}','frontend\frontcontroller@item');
Route::get('category/{id}','frontend\frontcontroller@category');
Route::get('subcategory/{id}','frontend\frontcontroller@subcategory');
Route::get('product/{id}','frontend\frontcontroller@product');
Route::get('allproduct','frontend\frontcontroller@allproduct');
Route::get('brand/{id}','frontend\frontcontroller@brand');
Route::get('brand_list','frontend\frontcontroller@brand_list');
Route::get('aboutus','frontend\frontcontroller@aboutus');
Route::get('privacypolicy','frontend\frontcontroller@privacypolicy');
Route::get('termcondition','frontend\frontcontroller@termcondition');
Route::get('how-to-buy','frontend\frontcontroller@howtobuy');
Route::get('FAQ','frontend\frontcontroller@faq');
Route::get('contactus','frontend\frontcontroller@contactus');
Route::get('serachproduct','frontend\frontcontroller@serachproduct');
Route::post('addtocart/{id}','frontend\frontcontroller@addtocart');
Route::get('checkcart','frontend\frontcontroller@checkcart');
Route::get('remove/{rowId}','frontend\frontcontroller@dataremove');
Route::get('allclear','frontend\frontcontroller@dataallclear');
Route::post('register','frontend\frontcontroller@register');
Route::get('checkout','frontend\frontcontroller@checkout');
Route::post('qty_update/{rowId}','frontend\frontcontroller@qty_update');
Route::post('shipping_details/{id}','frontend\frontcontroller@shipping_details');






///////////////// Customer Signin/Signup \\\\\\\\\\\\\\\\\\\

Route::get('userdashboard','frontend\customercontroller@userdashboard');
Route::get('allorder','frontend\customercontroller@allorder');
Route::get('invoice/{id}','frontend\customercontroller@invoice');
Route::view('barcode', 'barcode');
Route::get('updateinformation','frontend\customercontroller@updateinformation');
Route::get('changepassword','frontend\customercontroller@changepassword');

///////////////// Customer Message \\\\\\\\\\\\\\\\\\\

Route::post('customermsg','frontend\customercontroller@customermsg');





/////////////////// Backend Start \\\\\\\\\\\\\\\\\\\\\


Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('createadmin','backend\backcontroller@createadmin');
Route::post('usercreate','backend\backcontroller@usercreate');
Route::get('manageadmin','backend\backcontroller@manageadmin');
Route::get('inactiveadmin/{id}','backend\backcontroller@inactiveadmin');
Route::get('activeadmin/{id}','backend\backcontroller@activeadmin');
Route::get('admindelete/{id}','backend\backcontroller@admindelete');
Route::get('adminedit/{id}','backend\backcontroller@adminedit');
Route::post('usercreateupdate/{id}','backend\backcontroller@usercreateupdate');



//////////////Item Information Start///////////////

Route::get('item','backend\itemcontroller@item');
Route::post('iteminsert','backend\itemcontroller@iteminsert');
Route::get('manageitem','backend\itemcontroller@manageitem');
Route::get('inactiveitem/{id}','backend\itemcontroller@inactiveitem');
Route::get('activeitem/{id}','backend\itemcontroller@activeitem');
Route::get('deleteitem/{id}','backend\itemcontroller@deleteitem');
Route::get('edititem/{id}','backend\itemcontroller@edititem');
Route::post('itemupdate/{id}','backend\itemcontroller@itemupdate');

//////////////Item Information End///////////////

//////////////Category Information Start///////////////

Route::get('category','backend\categorycontroller@category');
Route::post('categoryinsert','backend\categorycontroller@categoryinsert');
Route::get('managecategory','backend\categorycontroller@managecategory');
Route::get('inactivecategory/{id}','backend\categorycontroller@inactivecategory');
Route::get('activecategory/{id}','backend\categorycontroller@activecategory');
Route::get('deletecategory/{id}','backend\categorycontroller@deletecategory');
Route::get('categoryedit/{id}','backend\categorycontroller@categoryedit');
Route::post('categoryupdate/{id}','backend\categorycontroller@categoryupdate');
Route::get('subcategory','backend\categorycontroller@subcategory');
Route::get('categoryget/{item_id}','backend\categorycontroller@categoryget');
Route::post('subcategoryinsert','backend\categorycontroller@subcategoryinsert');
Route::get('managesubcategory','backend\categorycontroller@managesubcategory');
Route::get('inactivesubcategory/{id}','backend\categorycontroller@inactivesubcategory');
Route::get('activesubcategory/{id}','backend\categorycontroller@activesubcategory');
Route::get('deletesubcategory/{id}','backend\categorycontroller@deletesubcategory');
Route::get('subcategoryedit/{id}','backend\categorycontroller@subcategoryedit');
Route::post('subcategoryupdate/{id}','backend\categorycontroller@subcategoryupdate');

//////////////Category Information End///////////////

//////////////Brand Information Start///////////////

Route::get('brand','backend\brandcontroller@brand');
Route::post('brandinsert','backend\brandcontroller@brandinsert');
Route::get('managebrand','backend\brandcontroller@managebrand');
Route::get('inactivebrand/{id}','backend\brandcontroller@inactivebrand');
Route::get('activebrand/{id}','backend\brandcontroller@activebrand');
Route::get('branddelete/{id}','backend\brandcontroller@branddelete');
Route::get('brandedit/{id}','backend\brandcontroller@brandedit');
Route::post('brandupdate/{id}','backend\brandcontroller@brandupdate');

//////////////Brand Information End///////////////

//////////////Product Information Start///////////////

Route::get('product','backend\productcontroller@product');
Route::get('manageproduct','backend\productcontroller@manageproduct');
Route::post('productinsert','backend\productcontroller@productinsert');
Route::get('categoryget/{item_id}','backend\productcontroller@categoryget');
Route::get('inactiveproduct/{id}','backend\productcontroller@inactiveproduct');
Route::get('activeproduct/{id}','backend\productcontroller@activeproduct');
Route::get('inactivestockstatus/{id}','backend\productcontroller@inactivestockstatus');
Route::get('activestockstatus/{id}','backend\productcontroller@activestockstatus');
Route::get('deleteproduct/{id}','backend\productcontroller@deleteproduct');
Route::get('editproduct/{id}','backend\productcontroller@editproduct');
Route::post('productupdate/{id}','backend\productcontroller@productupdate');
Route::get('viewallproduct','backend\productcontroller@viewallproduct');
Route::get('subcategoryget/{category_id}','backend\productcontroller@subcategoryget');





//////////////Product Information End///////////////

//////////////Slider Information Start///////////////

Route::get('slider','backend\slidercontroller@slider');
Route::post('sliderinsert','backend\slidercontroller@sliderinsert');
Route::get('manageslider','backend\slidercontroller@manageslider');
Route::get('deleteslider/{id}','backend\slidercontroller@deleteslider');
Route::get('editslider/{id}','backend\slidercontroller@editslider');
Route::post('sliderupdate/{id}','backend\slidercontroller@sliderupdate');

//////////////Slider Information End///////////////

//////////////Setting Information Start///////////////

Route::get('setting','backend\settingcontroller@setting');
Route::post('updatesetting/{id}','backend\settingcontroller@updatesetting');

//////////////Setting Information End///////////////

//////////////About Information Start///////////////

Route::get('about','backend\backcontroller@about');
Route::post('aboutupdate/{id}','backend\backcontroller@aboutupdate');

//////////////About Information End///////////////

//////////////Contact Information Start///////////////

Route::get('contact','backend\backcontroller@contact');
Route::post('contactupdate/{id}','backend\backcontroller@contactupdate');

//////////////Contact Information End///////////////

//////////////Privacy & Policy Information Start///////////////

Route::get('privacy&policy','backend\backcontroller@privacypolicy');
Route::post('updateprivacypolicy/{id}','backend\backcontroller@updateprivacypolicy');

//////////////Privacy & Policy Information End///////////////

//////////////Term & Condition Information Start///////////////

Route::get('term&condition','backend\backcontroller@termcondition');
Route::Post('termconditionupdate/{id}','backend\backcontroller@termconditionupdate');

//////////////Term & Condition Information End///////////////

//////////////How To Buy Information Start///////////////

Route::get('howtobuy','backend\backcontroller@howtobuy');
Route::post('howtobuyupdate/{id}','backend\backcontroller@howtobuyupdate');

//////////////How To Buy Information End///////////////

//////////////Faq Information Start///////////////

Route::get('faq','backend\backcontroller@faq');
Route::post('faqinsert','backend\backcontroller@faqinsert');
Route::get('managefaq','backend\backcontroller@managefaq');
Route::get('deletefaq/{id}','backend\backcontroller@deletefaq');
Route::get('editfaq/{id}','backend\backcontroller@editfaq');
Route::post('faqupdate/{id}','backend\backcontroller@faqupdate');




//////////////Faq Information End///////////////


//////////////Order Information Start///////////////


Route::get('orderinfomation','backend\orderinformationcontroller@orderinfomation');
Route::get('pendingorder','backend\orderinformationcontroller@pendingorder');
Route::get('processingorder','backend\orderinformationcontroller@processingorder');
Route::get('shippingorder','backend\orderinformationcontroller@shippingorder');
Route::get('completdorder','backend\orderinformationcontroller@completdorder');
Route::post('update/{id}','backend\orderinformationcontroller@update');

//////////////Order Information End///////////////


///////////////// Customer Message Start \\\\\\\\\\\\\\\\\\\

Route::get('customermessage','backend\backcontroller@customermessage');

///////////////// Customer Message End \\\\\\\\\\\\\\\\\\\














