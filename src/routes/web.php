<?php
if(file_exists(storage_path('installed'))){
	$check = DB::table('settings')->where('id', 94)->first();
	if($check->value == 'Maintenance'){
		$middleware = ['installer','env'];
	}
	else{
		$middleware = ['installer', 'verify_email_or_phone'];
	}
}
else{
	$middleware = ['installer', 'verify_email_or_phone'];
}
Route::get('/form','Web\ShippingEnquiryController@form');
Route::post('/form','Web\ShippingEnquiryController@formStore')->name('form_store');

Route::get('/verify','VerifiedController@verifyView')->middleware('verified_email_or_phone')->name('verify');
Route::get('/send_code','VerifiedController@sendCode')->name('send_code');

Route::get('/verified','VerifiedController@verifiedView')->name('verified_view');

Route::get('/email/verified','VerifiedController@verifiedByEmail')->name('email_verified');
Route::get('/phone/verified','VerifiedController@verifiedByPhone')->name('phone_verified');
Route::get('/sent/code/again','VerifiedController@sendAgainCode')->name('sent_code_again');

Route::get('/maintance','Web\IndexController@maintance');

Route::group(['namespace' => 'Web','middleware' => ['installer']], function () {
Route::get('/login', 'CustomersController@login');
Route::post('/process-login', 'CustomersController@processLogin');
Route::get('/logout', 'CustomersController@logout')->middleware('Customer');
});
Route::group(['namespace' => 'Web','middleware' => $middleware], function () {
	Route::get('general_error/{msg}', function($msg) {
		 return view('errors.general_error',['msg' => $msg]);
	});
		Route::get('/','IndexController@index');
		// Route::get('/','IndexController@index')->middleware('verify_email_or_phone');
		Route::post('/change_language', 'WebSettingController@changeLanguage');
		Route::post('/change_currency', 'WebSettingController@changeCurrency');
		Route::post('/addToCart', 'CartController@addToCart');
		Route::post('/modal_show', 'ProductsController@ModalShow');
		Route::get('/deleteCart', 'CartController@deleteCart');
		Route::get('/viewcart', 'CartController@viewcart');
		Route::get('/editcart/{id}/{slug}', 'CartController@editcart');
		Route::post('/updateCart', 'CartController@updateCart');
		Route::post('/updatesinglecart', 'CartController@updatesinglecart');
		Route::get('/cartButton', 'CartController@cartButton');

		Route::get('/profile', 'CustomersController@profile')->middleware('Customer');
		Route::get('/wishlist', 'CustomersController@wishlist')->middleware('Customer');
		Route::post('/updateMyProfile', 'CustomersController@updateMyProfile')->middleware('Customer');
		Route::post('/updateMyPassword', 'CustomersController@updateMyPassword')->middleware('Customer');
		Route::get('UnlikeMyProduct/{id}', 'CustomersController@unlikeMyProduct')->middleware('Customer');
		Route::post('likeMyProduct', 'CustomersController@likeMyProduct');
		Route::post('addToCompare', 'CustomersController@addToCompare');
		Route::get('compare', 'CustomersController@Compare')->middleware('Customer');
		Route::get('deletecompare/{id}', 'CustomersController@DeleteCompare')->middleware('Customer');
		Route::get('/orders', 'OrdersController@orders')->middleware('Customer');
		Route::get('/view-order/{id}', 'OrdersController@viewOrder')->middleware('Customer');
		Route::post('/updatestatus/', 'OrdersController@updatestatus')->middleware('Customer');
		Route::get('/shipping-address', 'ShippingAddressController@shippingAddress')->middleware('Customer');
		Route::post('/addMyAddress', 'ShippingAddressController@addMyAddress')->middleware('Customer');
		Route::post('/myDefaultAddress', 'ShippingAddressController@myDefaultAddress')->middleware('Customer');
		Route::post('/update-address', 'ShippingAddressController@updateAddress')->middleware('Customer');
		Route::get('/delete-address/{id}', 'ShippingAddressController@deleteAddress')->middleware('Customer');
		Route::post('/ajaxZones', 'ShippingAddressController@ajaxZones');
		//news section
		Route::get('/news', 'NewsController@news');
		Route::get('/news-detail/{slug}', 'NewsController@newsDetail');
		Route::post('/loadMoreNews', 'NewsController@loadMoreNews');
		Route::get('/page', 'IndexController@page');
		Route::get('/shop', 'ProductsController@shop');
		Route::post('/shop', 'ProductsController@shop');
		Route::get('/product-detail/{slug}', 'ProductsController@productDetail');
		Route::post('/filterProducts', 'ProductsController@filterProducts');
		Route::post('/getquantity', 'ProductsController@getquantity');

		Route::get('/guest_checkout', 'OrdersController@guest_checkout');
		Route::get('/checkout', 'OrdersController@checkout')->middleware('Customer');
		Route::post('/checkout_shipping_address', 'OrdersController@checkout_shipping_address')->middleware('Customer');
		Route::post('/checkout_billing_address', 'OrdersController@checkout_billing_address')->middleware('Customer');
		Route::post('/checkout_payment_method', 'OrdersController@checkout_payment_method')->middleware('Customer');
		Route::post('/paymentComponent', 'OrdersController@paymentComponent')->middleware('Customer');
		Route::post('/place_order', 'OrdersController@place_order')->middleware('Customer');
		Route::get('/orders', 'OrdersController@orders')->middleware('Customer');
		Route::post('/updatestatus/', 'OrdersController@updatestatus')->middleware('Customer');
		Route::post('/myorders', 'OrdersController@myorders')->middleware('Customer');
		Route::get('/stripeForm', 'OrdersController@stripeForm')->middleware('Customer');
		Route::get('/view-order/{id}', 'OrdersController@viewOrder')->middleware('Customer');
		Route::post('/pay-instamojo', 'OrdersController@payIinstamojo')->middleware('Customer');

		Route::get('/checkout/hyperpay', 'OrdersController@hyperpay')->middleware('Customer');
		Route::get('/checkout/hyperpay/checkpayment', 'OrdersController@checkpayment')->middleware('Customer');
		Route::post('/checkout/payment/changeresponsestatus', 'OrdersController@changeresponsestatus')->middleware('Customer');
		Route::post('/apply_coupon', 'CartController@apply_coupon');
		Route::get('/removeCoupon/{id}', 'CartController@removeCoupon')->middleware('Customer');

		Route::get('/signup', 'CustomersController@signup');
		Route::get('/logoutt', 'CustomersController@logout')->middleware('Customer');
		Route::post('/signupProcess', 'CustomersController@signupProcess');
		Route::get('/forgotPassword', 'CustomersController@forgotPassword');
		Route::get('/recoverPassword', 'CustomersController@recoverPassword');
		Route::post('/processPassword', 'CustomersController@processPassword');


		Route::get('login/{social}', 'CustomersController@socialLogin');
		Route::get('login/{social}/callback', 'CustomersController@handleSocialLoginCallback');
		Route::post('/commentsOrder', 'OrdersController@commentsOrder');
		Route::post('/subscribeNotification/', 'CustomersController@subscribeNotification');
		Route::get('/contact', 'IndexController@contactus');
		Route::post('/processContactUs', 'IndexController@processContactUs');

	});

	Route::get('/test', 'Web\IndexController@test1');



Route::group(['prefix' => 'config'], function () {

     //Clear Cache facade value:
    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        return '<h1>Cache facade value cleared</h1>';
    });

    //Reoptimized class loader:
    Route::get('/optimize', function() {
        $exitCode = Artisan::call('optimize');
        return '<h1>Reoptimized class loader</h1>';
    });

    //Route cache:

    Route::get('/route-cache', function() {
        $exitCode = Artisan::call('route:cache');
        return '<h1>Routes cached</h1>';
    });


    //Clear Route cache:
    Route::get('/route-clear', function() {
        $exitCode = Artisan::call('route:clear');
        return '<h1>Route cache cleared</h1>';
    });

    //Clear View cache:
    Route::get('/view-clear', function() {
        $exitCode = Artisan::call('view:clear');
        return '<h1>View cache cleared</h1>';
    });

    //Clear Config cache:
    Route::get('/config-cache', function() {
        $exitCode = Artisan::call('config:cache');
        return '<h1>Clear Config cleared</h1>';
    });

    //Clear Config cache:
    Route::get('/migrate', function() {
        $exitCode = Artisan::call('migrate');
        return '<h1>Migration Success</h1>';
    });

    //Clear Config cache:
    Route::get('/dump-autoload', function() {
        $exitCode = Artisan::call('dump-autoload');
        return '<h1>Migration Success</h1>';
    });
});
