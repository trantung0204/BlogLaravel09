<?php
use App\Product;
/*Route::get('test', function () {
    return view('admin.post.dashboard');
});*/

	Route::prefix('admin')->group(function(){
		Route::middleware('auth')->group( function ()
		{
			Route::resource('posts','admin\PostController');
			Route::resource('categories','admin\CategoryController');
			Route::resource('users','admin\UserController');
			Route::get('categories/getposts/{categories}', 'admin\CategoryController@getposts')->name('categories.getposts');
		});
	});

	Route::prefix('blog')->group(function(){
		Route::get('home', 'blog\PostController@blogHome')->name('blog.home');
		Route::get('post/{post}', 'blog\PostController@viewPost')->name('blog.post');
		Route::get('category/{category}', 'blog\PostController@getPosts')->name('blog.category');

        Route::get('login', 'GuestAuth\LoginController@showLoginForm')->name('guest.login');
        Route::post('login', 'GuestAuth\LoginController@login')->name('guest.authenticate');
        Route::post('logout', 'GuestAuth\LoginController@logout')->name('guest.logout');

        Route::get('register', 'GuestAuth\RegisterController@showRegistrationForm')->name('guest.register');
        Route::post('register', 'GuestAuth\RegisterController@register')->name('guest.signup');

        Route::get('password/reset', 'GuestAuth\ForgotPasswordController@showLinkRequestForm')->name('guest.password.request');
        Route::post('password/email', 'GuestAuth\ForgotPasswordController@sendResetLinkEmail')->name('guest.password.email');
        Route::get('password/reset/{token}', 'GuestAuth\ResetPasswordController@showResetForm')->name('guest.password.reset');
        Route::post('password/reset', 'GuestAuth\ResetPasswordController@reset');
	});

	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('login/google', 'Auth\GoogleController@redirectToProvider')->name('login.google');
	Route::get('login/google/callback', 'Auth\GoogleController@handleProviderCallback');

	Route::get('login/facebook', 'Auth\FacebookController@redirectToProvider');
	Route::get('login/facebook/callback', 'Auth\FacebookController@handleProviderCallback');


	
