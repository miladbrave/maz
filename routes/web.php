<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/', [App\Http\Controllers\front\HomeController::class, 'index'])->name('home'); //
Route::get('/about', [App\Http\Controllers\front\HomeController::class, 'about'])->name('about'); //
Route::get('/cart', [App\Http\Controllers\front\HomeController::class, 'cart'])->name('cart.self'); //
Route::get('/category/{id}/{sort?}', [App\Http\Controllers\front\HomeController::class, 'category'])->name('category'); //
Route::get('/checkout', [App\Http\Controllers\front\HomeController::class, 'checkout'])->name('checkout'); //
Route::get('/contact', [App\Http\Controllers\front\HomeController::class, 'contact'])->name('contact'); //
Route::get('fag', [App\Http\Controllers\front\HomeController::class, 'fag'])->name('fag'); //
Route::get('product/{slug}', [App\Http\Controllers\front\HomeController::class, 'product'])->name('product.self'); //
Route::get('add_cart/{slug}',[App\Http\Controllers\front\HomeController::class, 'addcart'])->name('add.cart'); //
Route::get('removeproduct/{id}',[App\Http\Controllers\front\HomeController::class, 'removeproduct'])->name('remove.product'); //
Route::post('addqty/{id}',[App\Http\Controllers\front\HomeController::class, 'addqty'])->name('add.qty'); //
Route::patch('updateUser',[App\Http\Controllers\front\HomeController::class, 'topay'])->name('updateuser'); //
Route::get('/profile',[App\Http\Controllers\front\HomeController::class, 'profile'])->name('profile'); //
Route::post('messages/{id?}',[App\Http\Controllers\front\HomeController::class, 'message'])->name('contact.messages'); //
Route::patch('userupdate',[App\Http\Controllers\front\HomeController::class, 'userUpdate'])->name('userUpdate');
Route::get('downloadVideos{id}',[App\Http\Controllers\front\HomeController::class, 'downloadvideo'])->name('downloadvideo');
Route::get('payStatus',[App\Http\Controllers\front\PayController::class, 'payStatus'])->name('payStatus');
Route::get('pay',[App\Http\Controllers\front\PayController::class, 'pay'])->name('pay');
Route::any('paypack_callback',[App\Http\Controllers\front\PayController::class, 'paypack_callback'])->name('paypack_callback');
Route::get('tags/{id?}',[App\Http\Controllers\front\HomeController::class, 'tags'])->name('tags');
//Route::get('dirpay',[App\Http\Controllers\front\PayController::class, 'pay2'])->name('pay2');
//Route::post('directpay','front\HomeController@direct')->name('directpay');
//Route::get('blog','front\HomeController@blog')->name('blog');
//Route::get('bloglist','front\HomeController@downloads')->name('bloglist');
//Route::get('removedownloads/{id}','front\HomeController@removedownload')->name('remove.downloads');
//Route::get('downloads','front\HomeController@downloads')->name('downloads');
//Route::get('add_cart_download/{id}','front\HomeController@addcartdownload')->name('add.cart.download');

// Route::group(['prefix'=>'administrator'], function () {
Route::group(['prefix'=>'administrator','middleware'=>'admin'], function () {
    Route::get('/', [App\Http\Controllers\back\DashboardController::class, 'index'])->name('administrator');
    Route::resource('admin', App\Http\Controllers\back\AdminController::class);
    Route::resource('product', App\Http\Controllers\back\ProductController::class);
    Route::resource('brand',App\Http\Controllers\back\BrandController::class);
    Route::resource('slider',App\Http\Controllers\back\SliderController::class);
    Route::resource('banner',App\Http\Controllers\back\BannerController::class);
    Route::resource('category',App\Http\Controllers\back\CategoryController::class);
    Route::resource('attribute',App\Http\Controllers\back\AttributeController::class);
    Route::resource('attributeValue',App\Http\Controllers\back\AttributeValueController::class);
    Route::resource('message',App\Http\Controllers\back\MessageController::class);
    Route::resource('download',App\Http\Controllers\back\DownloadController::class);
    Route::resource('blog',App\Http\Controllers\back\BlogController::class);
    Route::resource('factors',App\Http\Controllers\back\FactorController::class);
    Route::resource('tags',App\Http\Controllers\back\TagController::class);
    Route::post('photo',[App\Http\Controllers\back\ProductController::class, 'photoStore'])->name('productPhoto');
    Route::get('photoDestroy/{id}',[App\Http\Controllers\back\ProductController::class, 'photoDestroy'])->name('photoDestroy');
    Route::post('sendmessagemain',[App\Http\Controllers\back\DashboardController::class, 'sendmain'])->name('messages.send.main');
    Route::get('mainmessage',[App\Http\Controllers\back\DashboardController::class, 'mainmessage'])->name('mainmessage');
    Route::get('extend_factor/{id}',[App\Http\Controllers\back\FactorController::class, 'generate_pdf'])->name('generate_pdf');
});

Route::group(['prefix'=>'api'], function () {
    Route::get('categories',[App\Http\Controllers\back\CategoryController::class, 'first']);
    Route::post('categories/attribute',[App\Http\Controllers\back\CategoryController::class, 'getAttribute']);
    Route::post('searchProducts',[App\Http\Controllers\front\HomeController::class, 'apiGetProducts']);
    Route::post('messageapi',[App\Http\Controllers\front\HomeController::class, 'messageApi']);
    Route::get('chart',[App\Http\Controllers\back\DashboardController::class, 'chartApi']);
});
