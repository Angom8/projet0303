<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


/*Non logged pages*/

Route::get('/', function () {
    return view('home');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('login', function () {
    return view('login');
});

Route::get('signin', function () {
    return view('signin');
});

Route::get('logout', function () {
    return view('logout');
});


/*do an auto redirection to match user-type and panel*/

Route::get('mypanel', function () {
    return view('redirect-login');
});

/*Type Admin user pages*/

Route::get('admin/', function () {
    return view('user-global');
});

Route::get('admin/messages', function () {
    return view('messages');
});

Route::get('admin/users', function () {
    return view('users');
});

Route::get('admin/boats', function () {
    return view('boats');
});

Route::get('admin/boat', function () {
    return view('boat');
});

Route::get('admin/fournisseurs', function () {
    return view('fournisseurs');
});

Route::get('admin/fournisseur', function () {
    return view('fournisseur');
});

/*Type Secretaire user pages*/
Route::get('helper/', function () {
    return view('user-global');
});

Route::get('helper/users', function () {
    return view('users');
});

Route::get('helper/user', function () {
    return view('user');
});

Route::get('helper/add-user', function () {
    return view('add-user');
});

/*Type Adhérent user pages*/

Route::get('panel/', function () {
    return view('user-global');
});

Route::get('panel/fournisseurs', function () {
    return view('fournisseurs');
});

Route::get('panel/fournisseur', function () {
    return view('fournisseur');
});

Route::get('panel/contact-fournisseur', function () {
    return view('contact-fournisseur');
});

Route::get('panel/boats', function () {
    return view('my-boats');
});

Route::get('panel/boat', function () {
    return view('boat');
});

Route::get('panel/send-boat', function () {
    return view('send-boat');
});

Route::get('panel/update-boat', function () {
    return view('update-boat');
});

/*Else*/


Route::get('/login', function () {
    return view('login');
});

