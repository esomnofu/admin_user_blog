<?php
#USER GROUP ROUTES
Route::group(['namespace' => 'User'], function(){

//HOME ROUTE
Route::get('/', 'HomeController@index')->name('home');

//POST ROUTE(
Route::get('post/{post}', 'PostController@post')->name('post');



#ROUTE FOR GETTING POSTS BY TAGS AND CATEGORIES
Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');

Route::get('post/category/{category}', 'HomeController@category')->name('category');


#ROUTES FOR VUEJS
Route::post('getPosts', 'PostController@getAllposts');
Route::post('saveLike', 'PostController@saveLike');

});

#Access HomeController Outside User Namespace/Folder Model
Route::get('/home', 'HomeController@index')->name('user.home');






#ADMIN GROUP ROUTES
Route::group(['namespace' => 'Admin', 'middleware'=>'auth:admin'], function(){

//ROLE ROUTE
Route::resource('admin/role', 'RoleController');

//PERMISSIONS ROUTE
Route::resource('admin/permission', 'PermissionController');	

//USER ROUTE
Route::resource('admin/user', 'UserController');	

//HOME ROUTE
Route::get('admin/home', 'HomeController@index')->name('admin.home');	

//POST ROUTE
Route::resource('admin/post', 'PostController');

//TAG ROUTE
Route::resource('admin/tag', 'TagController');

//CATEGORY ROUTE
Route::resource('admin/category', 'CategoryController');

});


Route::group(['namespace' => 'Admin'], function(){

 Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
 
 Route::post('admin/login', 'Auth\LoginController@login');

});



Auth::routes();
