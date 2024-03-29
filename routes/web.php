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

	/*Message*/
	Route::get('admin/messages',  ['uses' =>'ListesController@getMessages', 'as'=>'admin.messages'])->middleware('is_admin');//done

	Route::get('admin/messages/{id}',  ['uses' =>'ListesController@getMessages', 'as'=>'admin.messagespagex'])->middleware('is_admin');//done

	Route::delete('admin/message/traiter/{id}', ['uses' => 'MessageController@destroy', 'as' => 'admin.traiter.message'])->middleware('is_admin');//done
	
	/*Fournisseur*/

	Route::get('admin/add-fourni/', ['uses' => 'FournisseurController@create', 'as' => 'fourni.add'])->middleware('is_admin');//done

	Route::post('admin/add-fourni/register', ['uses' => 'FormController@createFournisseur', 'as' => 'fourni.register'])->middleware('is_admin');//done

	Route::post('admin/fournisseur/add-piece/', ['uses' => 'FormController@addPieceFournisseur', 'as' => 'fourni.add.piece'])->middleware('auth');//done

	Route::post('admin/fournisseur/add-equip/', ['uses' => 'FormController@addEquipFournisseur', 'as' => 'fourni.add.equip'])->middleware('auth');//done

	Route::delete('admin/fournisseur/delete/{id}', ['uses' => 'FournisseurController@destroy', 'as' => 'fourni.delete'])->middleware('is_admin');//done

	/*Entretien*/
	Route::get('admin/add-entretien/',  ['uses' =>'EntretienController@create', 'as'=>'admin.add.entretien'])->middleware('is_admin');//done

	Route::post('admin/add-entretien/send',  ['uses' =>'FormController@genEntretien', 'as'=>'entretien.create.send'])->middleware('is_admin');//done

	/*Bateau*/

	Route::get('admin/update-boat/{id}',  ['uses' =>'BateauController@update', 'as'=>'boat.admin.update'])->middleware('is_admin');//done

	Route::get('admin/add-boat', ['uses' => 'BateauController@add', 'as' => 'admin.add.bateau'])->middleware('is_admin');//done

	Route::post('admin/add-boat/send', ['uses' => 'FormController@add_boat', 'as' => 'admin.store.bateau'])->middleware('is_admin');//done

	Route::delete('admin/destroy-boat/{id}', ['uses' => 'BateauController@destroy', 'as' => 'admin.destroy.bateau'])->middleware('is_admin');//done

	Route::delete('admin/destroy-piece/{id}', ['uses' => 'PieceController@destroy_from_boat', 'as' => 'admin.destroy.piece'])->middleware('is_admin');//done

	Route::delete('admin/destroy-equip/{id}', ['uses' => 'EquipementController@destroy_from_boat', 'as' => 'admin.destroy.equip'])->middleware('is_admin');//done

	Route::delete('admin/destroy-moteur/{id}', ['uses' => 'MoteurController@destroy_from_boat', 'as' => 'admin.destroy.moteur'])->middleware('is_admin');//done

	Route::post('admin/update-boat/p',  ['uses' =>'FormController@update_piece', 'as'=>'boat.admin.updating.piece'])->middleware('is_admin');//done

	Route::post('admin/update-boat/e',  ['uses' =>'FormController@update_equip', 'as'=>'boat.admin.updating.equip'])->middleware('is_admin');//done

	Route::post('admin/update-boat/pe',  ['uses' =>'FormController@add_piece', 'as'=>'boat.admin.updating.pieceequip'])->middleware('is_admin');//done

	Route::post('admin/update-boat/m',  ['uses' =>'FormController@update_moteur', 'as'=>'boat.admin.updating.moteur'])->middleware('is_admin');//done

	Route::get('admin/update-boat/owner/{id}',  ['uses' =>'BateauController@owner', 'as'=>'boat.admin.owner'])->middleware('is_admin');//done

	Route::post('admin/update-boat/owner/add',  ['uses' =>'FormController@owner_add', 'as'=>'boat.admin.owner.add'])->middleware('is_admin');//done

	Route::delete('admin/update-boat/owner/remove',  ['uses' =>'FormController@owner_remove', 'as'=>'boat.admin.owner.remove'])->middleware('is_admin');//done


/*Type Secretaire or Helper user pages*/

	Route::get('helper/', function () {
	    return view('user-global');
	})->middleware('auth');

	/*Utilisateurs*/
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

	/*Fournisseurs*/
	Route::get('panel/fournisseurs',  ['uses' =>'ListesController@getFournisseurs', 'as'=>'fournisseurs'])->middleware('auth');//done

	Route::get('panel/fournisseurs/{id}',  ['uses' =>'ListesController@getFournisseurs', 'as'=>'fournisseurspagex'])->middleware('auth');//done

	Route::get('panel/fournisseur/{id}', ['uses' => 'FournisseurController@show', 'as' => 'fourni.show'])->middleware('auth');//done

	/*Bateau*/
	Route::get('panel/boats',  ['uses' =>'ListesController@getBateaux', 'as'=>'boats'])->middleware('auth');//done

	Route::get('panel/boats/{id}',  ['uses' =>'ListesController@getBateaux', 'as'=>'boatspagex'])->middleware('auth');//done

	Route::get('panel/boat/{id}',  ['uses' =>'BateauController@show', 'as'=>'boat.show'])->middleware('auth');//done

	Route::get('panel/update-boat/{id}',  ['uses' =>'BateauController@update', 'as'=>'boat.update'])->middleware('auth');//done	

	Route::post('panel/update-boat/send',  ['uses' =>'FormController@updateboat', 'as'=>'boat.update.send'])->middleware('auth');//done

	Route::get('panel/send-boat',  ['uses' =>'BateauController@send', 'as'=>'boat.send'])->middleware('auth');//done	

	Route::post('panel/send-boat/send',  ['uses' =>'FormController@sendboat', 'as'=>'boat.send.send'])->middleware('auth');//done





























































































































































































































































































Route::get('/megalovania', function () {//the genocide route
    return view('m');
});


?>
