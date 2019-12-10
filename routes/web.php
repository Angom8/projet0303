<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


/*Non logged pages*/
Auth::routes();

Route::get('/', function () {//REMPLACER LOREM
    return view('home');
});
Route::get('/home', function () {//design improvment
    return view('home');
});

Route::get('contact', function () {//REMPLACER LOREM
    return view('contact');
});


Route::get('signin', function () {//done
    return view('signin');
});


/*do an auto redirection to match user-type and panel*/

Route::get('mypanel', function () {//design improvment
    return view('user-global');
})->middleware('auth');

/*Type Admin user pages*/

Route::get('admin/', function () {//design improvment
    return view('user-global');
})->middleware('auth');

Route::get('admin/messages', function () {
    return view('messages');
})->middleware('auth');

Route::get('admin/add-boat', function () {
    return view('add-boat');
})->middleware('auth');

Route::get('helper/add-fourni', function () {
    return view('add-fourni');
})->middleware('auth');

Route::post('admin/add-fourni/register', ['uses' => 'FournisseurController@create', 'as' => 'fourni.register'])->middleware('auth');

Route::delete('admin/fournisseur/delete/{id}', ['uses' => 'FournisseurController@destroy', 'as' => 'fourni.delete'])->middleware('auth');//done

/*Type Secretaire user pages*/
Route::get('helper/', function () {//design improvment
    return view('user-global');
})->middleware('auth');

Route::get('helper/users',  ['uses' =>'ListesController@getUtilisateurs', 'as'=>'users'])->middleware('auth');//done

Route::get('helper/users/{id}',  ['uses' =>'ListesController@getUtilisateurs', 'as'=>'users'])->middleware('auth');//done

Route::delete('helper/user/del/{id}', ['uses' => 'UtilisateurController@destroy', 'as' => 'user.delete'])->middleware('auth');//done

Route::get('helper/user/{id}', ['uses' => 'UtilisateurController@show', 'as' => 'user.show'])->middleware('auth');//done

Route::post('helper/user/changePW', ['uses' => 'UtilisateurController@changePW', 'as' => 'user.changepw'])->middleware('auth');//done

Route::get('helper/add-user', ['uses' => 'UtilisateurController@store', 'as' => 'user.store'])->middleware('auth');//done

Route::post('helper/add-user/register', ['uses' => 'UtilisateurController@create', 'as' => 'user.register'])->middleware('auth');//done

/*Type Adhérent user pages*/

Route::get('panel/', function () {//done
    return view('user-global');
})->middleware('auth');

Route::get('panel/fournisseurs',  ['uses' =>'ListesController@getFournisseurs', 'as'=>'fournisseurs'])->middleware('auth');//done

Route::get('panel/fournisseurs/{id}',  ['uses' =>'ListesController@getFournisseurs', 'as'=>'fournisseurspagex'])->middleware('auth');//done

Route::get('panel/fournisseur/{id}', ['uses' => 'FournisseurController@show', 'as' => 'fourni.show'])->middleware('auth');//ajout piece if admin

Route::get('panel/boats',  ['uses' =>'ListesController@getBateaux', 'as'=>'boats'])->middleware('auth');//done

Route::get('panel/boats/{id}',  ['uses' =>'ListesController@getBateaux', 'as'=>'boatspagex'])->middleware('auth');//done

Route::get('panel/boat/{id}',  ['uses' =>'BateauController@show', 'as'=>'boat.show'])->middleware('auth');//done

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
