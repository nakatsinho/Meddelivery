<?php

//first 
Auth::routes();
 
//after
// Auth::routes(['verify' => false]);

/* INTERFACE DO USUARIO */

Route::get('/', 'HomeController@index')->name('home');

Route::get('/chat', function () {
    return redirect()->route('timeline.index')->with('info', 'Ola, tudo em dia? Qualquer coisa estamos aqui...');
});

Route::get('/status', [
    'uses' => '\Meddelivery\Http\Controllers\StatusController@getStatus',
    'as' => 'timeline.index',
    'middleware' => ['auth'],
]);

Route::post('/status', [
    'uses' => '\Meddelivery\Http\Controllers\StatusController@postStatus',
    'as' => 'status.post',
    'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/reply', [
    'uses' => '\Meddelivery\Http\Controllers\StatusController@postReply',
    'as' => 'status.reply',
    'middleware' => ['auth'],
]);

Route::get('/perfil {username}', [
    'uses' => '\Meddelivery\Http\Controllers\PerfilController@index',
    'as' => 'perfil.index',
]);

/*** Rota para registro de usuario */

Route::get('/register', [
    'uses' => '\Meddelivery\Http\Controllers\Auth\AuthController@getSignup',
    'as' => 'auth.register',
    'middleware' => ['guest'],
]);

Route::post('/register', [
    'uses' => '\Meddelivery\Http\Controllers\Auth\AuthController@postSignup',
    'middleware' => ['guest'],
]);

Route::get('/registarAdmin', [
    'uses' => '\Meddelivery\Http\Controllers\Auth\AuthController@regAdmin',
    'as' => 'auth.registerAd',
    'middleware' => ['guest'],
]);

Route::post('/registarAdmin', [
    'uses' => '\Meddelivery\Http\Controllers\Auth\AuthController@postSignupAdmin',
    'middleware' => ['guest'],
]);


/*** Rota para login de usuario e Admin*/

Route::get('/login', 'Auth\AuthController@getSignin')->name('auth.login');
 

Route::post('/login', [
    'uses' => '\Meddelivery\Http\Controllers\Auth\AuthController@postSignin',
    'middleware' => ['guest'],
]);

Route::post('/logout', [
    'uses' => '\Meddelivery\Http\Controllers\Auth\AuthController@getSignout',
    'as' => 'auth.logout',
]);

/*** Rota para pesquisa do usuario */

Route::get('/search', [
    'uses' => '\Meddelivery\Http\Controllers\SearchController@getResultsProduct',
    'as' => 'pesquisa.result',
]);

// Route::get('/search', [
//     'uses' => '\Meddelivery\Http\Controllers\SearchController@getResults',
//     'as' => 'pesquisa.result',
// ]);

Route::get('/searchUser {name}', [
    'uses' => '\Meddelivery\Http\Controllers\PerfilController@getProfile',
    'as' => 'pesquisa.index',
]);
/*** Fim da rota para pesquisa do usuario */

/*** Rota para amigos do usuario */

Route::get('/friends', [
    'uses' => '\Meddelivery\Http\Controllers\PatientController@getIndex',
    'as' => 'paciente.index',
    'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}', [
    'uses' => '\Meddelivery\Http\Controllers\PatientController@getAdd',
    'as' => 'paciente.add',
    'middleware' => ['auth'],
]);

Route::get('/friends/accept/{username}', [
    'uses' => '\Meddelivery\Http\Controllers\PatientController@getAccept',
    'as' => 'paciente.accept',
    'middleware' => ['auth'],
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categorymenu/{id}', 'HomeController@verCatesMenu');

Route::get('/category/{id}', 'HomeController@verCates');

Route::get('/subcategory/{id}', 'HomeController@verSubCates');

Route::get('/marcas/{id}', 'HomeController@getBrandsId');

Route::get('/produto/{id}', 'HomeController@getProId');

Route::get('/category', 'HomeController@verCatesAll')->name('partials.listallcats');

Route::get('/products', 'HomeController@verProductAll')->name('partials.listallproducts');

Route::get('/marcas', 'HomeController@getAllBrands')->name('partials.listallmarcas');

Route::get('/carrinho', 'CartController@index');

Route::get('/contacto', 'HomeController@contact');

Route::get('/carrinho/addItem/{id}', 'CartController@addItem');

Route::put('/carrinho/update/{id}', 'CartController@update');

Route::get('/carrinho/remove/{id}', 'CartController@destroy');

Route::get('/detalhes/{id}', 'HomeController@detalheProduto');

Route::resource('/farmacia', 'FarmaciaController');

Route::get('/farmacia%user', 'FarmaciaController@wait')->name('auth.wait');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/checkout', 'CheckoutController@index');

    Route::get('/perfil', 'PerfilController@index')->name('perfil.index');

    Route::get('/perfil_foto', 'PerfilController@getPhoto');

    Route::post('/perfil_foto', 'PerfilController@postPhoto');

    Route::get('/pedidos', 'PerfilController@orders');

    Route::get('/endereco', 'PerfilController@address');

    Route::post('/actualizarEndereco', 'PerfilController@updateAddress');

    Route::get('/dados', 'PerfilController@dados');

    Route::post('/actualizarDados', 'PerfilController@updateDados');

    Route::get('/desejos', 'HomeController@getDesejo');

    Route::post('/adiconarDesejo', 'HomeController@addDesejo')->name('addDesejo');

    Route::get('/removerDesejo/{id}', 'HomeController@removeDesejo');
});

/* FIM DA INTERFACE DO USUARIO */

/* ADMIN ROUTES INTERFACE */

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('admin');
    });
    Route::resource('produtos', 'ProductController');

    Route::resource('categorias', 'CategoryController');

   
});
Route::post('admin/validar', 'CheckoutController@address')->name('admin.validar');

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/stripe', 'PaymentController@index');
Route::post('store', 'PaymentController@store');

Route::get('qrcode', function () {
    return QrCode::size(300)
                     ->backgroundColor(29,95,0)
                     ->SMS('+258 842536927', 'Conte-nos a tua dificuldade!');
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');

/*** Rota para login via redes sociais do usuario */
Route::get('login/google', 'SocialController@googleRedirect');

Route::get('login/google/callback', 'SocialController@googleCallback');

Route::get('login/github', 'SocialController@githubRedirect');

Route::get('login/github/callback', 'SocialController@githubCallback');

Route::get('login/facebook', 'SocialController@facebookRedirect');

Route::get('login/facebook/callback', 'SocialController@facebookCallback');

Route::get('/factura/{id}', 'InvoiceController@getInvoice')->name('invoice');

Route::get('/factura-pdf/{id}', 'InvoiceController@getPdf');

// Route::get('/fact', function(){
//     return view('perfil.agradecimento');
// });
Route::get('/termos', function(){
    return view('terms');
});
Route::get('/about', function(){
    return view('about');
});