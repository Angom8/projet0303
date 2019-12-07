<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


/*Non logged pages*/
Auth::routes();

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

Route::delete('helper/user/del/{id}', ['uses' => 'UtilisateurController@destroy', 'as' => 'user.delete'])->middleware('auth');

Route::get('helper/user/{id}', ['uses' => 'UtilisateurController@show', 'as' => 'user.show'])->middleware('auth');

Route::post('helper/user/changePW', ['uses' => 'UtilisateurController@changePW', 'as' => 'user.changepw'])->middleware('auth');

Route::get('helper/add-user', function () {
    return view('add-user');
})->middleware('auth');

Route::post('helper/add-user/register', ['uses' => 'UtilisateurController@create', 'as' => 'user.register'])->middleware('auth');

/*Type Adhérent user pages*/

Route::get('panel/', function () {//init
    return view('user-global');
})->middleware('auth');

Route::get('panel/fournisseurs',  ['uses' =>'ListesController@getFournisseurs', 'as'=>'fourni'])->middleware('auth');

Route::get('panel/fournisseurs/{id}',  ['uses' =>'ListesController@getFournisseurs', 'as'=>'fourni'])->middleware('auth');

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
