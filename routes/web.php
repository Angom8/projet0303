<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


/*Non logged pages*/
Auth::routes();

Route::get('/', function () {//done
    return view('home');
});

Route::get('/home', function () {//done
    return view('home');
});

Route::get('contact', function () {//done
    return view('contact');
});

Route::post('contact/send', ['uses' => 'FormController@contact', 'as' => 'contact.form']);//done

Route::get('signin', function () {//done
    return view('signin');
});

/*Type Admin user pages*/

Route::get('admin/', function () {//done
    return view('user-global');
})->middleware('is_admin');

Route::get('admin/messages', function () {
    return view('messages');
})->middleware('is_admin');

Route::get('admin/add-boat', function () {
    return view('add-boat');
})->middleware('is_admin');

Route::post('admin/add-fourni/register', ['uses' => 'FournisseurController@create', 'as' => 'fourni.register'])->middleware('is_admin');

Route::delete('admin/fournisseur/delete/{id}', ['uses' => 'FournisseurController@destroy', 'as' => 'fourni.delete'])->middleware('is_admin');//done

/*Type Secretaire or Helper user pages*/
Route::get('helper/', function () {//design improvment
    return view('user-global');
})->middleware('auth');

Route::get('helper/users',  ['uses' =>'ListesController@getUtilisateurs', 'as'=>'users'])->middleware('is_helper');//done

Route::get('helper/users/{id}',  ['uses' =>'ListesController@getUtilisateurs', 'as'=>'users'])->middleware('is_helper');//done

Route::delete('helper/user/del/{id}', ['uses' => 'UtilisateurController@destroy', 'as' => 'user.delete'])->middleware('is_helper');//done

Route::get('helper/user/{id}', ['uses' => 'UtilisateurController@show', 'as' => 'user.show'])->middleware('is_helper');//done

Route::post('helper/user/changePW', ['uses' => 'UtilisateurController@changePW', 'as' => 'user.changepw'])->middleware('is_helper');//done

Route::get('helper/add-user', ['uses' => 'UtilisateurController@store', 'as' => 'user.store'])->middleware('is_helper');//done

Route::post('helper/add-user/register', ['uses' => 'UtilisateurController@create', 'as' => 'user.register'])->middleware('is_helper');//done

/*Type Adhérent user pages*/

Route::get('mypanel', function () {//done
    return view('user-global');
})->middleware('auth');

Route::get('panel/', function () {//done
    return view('user-global');
})->middleware('auth');

Route::get('panel/fournisseurs',  ['uses' =>'ListesController@getFournisseurs', 'as'=>'fournisseurs'])->middleware('auth');//done

Route::get('panel/fournisseurs/{id}',  ['uses' =>'ListesController@getFournisseurs', 'as'=>'fournisseurspagex'])->middleware('auth');//done

Route::get('panel/fournisseur/{id}', ['uses' => 'FournisseurController@show', 'as' => 'fourni.show'])->middleware('auth');//ajout piece if admin

Route::get('panel/boats',  ['uses' =>'ListesController@getBateaux', 'as'=>'boats'])->middleware('auth');//done

Route::get('panel/boats/{id}',  ['uses' =>'ListesController@getBateaux', 'as'=>'boatspagex'])->middleware('auth');//done

Route::get('panel/boat/{id}',  ['uses' =>'BateauController@show', 'as'=>'boat.show'])->middleware('auth');//ajout piece if admin

Route::get('panel/send-boat', function () {
    return view('send-boat');
})->middleware('auth');

Route::get('panel/update-boat', function () {
    return view('update-boat');
})->middleware('auth');

?>
