<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


/*Non logged pages*/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
/*Route::get('profile', function () {
     Only authenticated users may enter...
})->middleware('auth');*/

Route::get('/', function () {//init
    return view('home');
});
Route::get('/home', function () {//init
    return view('home');
});

Route::get('contact', function () {//init
    return view('contact');
});


Route::get('signin', function () {//gen auto
    return view('signin');
});


/*do an auto redirection to match user-type and panel*/

Route::get('mypanel', function () {//
    return view('user-global');
})->middleware('auth');

/*Type Admin user pages*/

Route::get('admin/', function () {//init
    return view('user-global');
})->middleware('auth');

Route::get('admin/messages', function () {//init
    return view('messages');
})->middleware('auth');

Route::get('admin/add-boat', function () {
    return view('add-boat');
})->middleware('auth');


/*Type Secretaire user pages*/
Route::get('helper/', function () {//init
    return view('user-global');
})->middleware('auth');

Route::get('helper/users',  ['uses' =>'ListesController@getUtilisateurs', 'as'=>'users'])->middleware('auth');

Route::get('helper/users/{id}',  ['uses' =>'ListesController@getUtilisateurs', 'as'=>'users'])->middleware('auth');

Route::get('helper/user', function () {
    return view('user');
})->middleware('auth');

Route::get('helper/add-user', function () {
    return view('add-user');
})->middleware('auth');

/*Type Adhérent user pages*/

Route::get('panel/', function () {//init
    return view('user-global');
})->middleware('auth');

Route::get('panel/fournisseurs', function () {//init
    return view('fournisseurs');
})->middleware('auth');

Route::get('panel/fournisseur', function () {
    return view('fournisseur');
})->middleware('auth');

Route::get('panel/contact-fournisseur', function () {
    return view('contact-fournisseur');
})->middleware('auth');

Route::get('panel/boats', function () {//init
    return view('boats');
})->middleware('auth');

Route::get('panel/boat', function () {
    return view('boat');
})->middleware('auth');

Route::get('panel/send-boat', function () {
    return view('send-boat');
})->middleware('auth');

Route::get('panel/update-boat', function () {
    return view('update-boat');
})->middleware('auth');

?>
