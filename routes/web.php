<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWorld = 'Hello World!';
    return view('welcome', ['first' => $helloWorld]);
})->name('home');

Route::get('/model', function(){
    //$products = \App\Product::all(); //select * from products
    
    //Active Record
    //$user = new \App\User;
    //return $user = \App\User::find(3);
    //$user->name = 'Usuário teste teste';
    //$user->email = 'teste@teste.com';
    //$user->password = bcrypt('12345678');
    //return $user->save();
    //return $user->save();
    //return $products;
    //return \App\User::all(); //Collection
    //return \App\User::where('id',1)->first();
    //return \App\User::paginate(10);

    //Mass Assignment
    // return $user = \App\User::create([
    //     'name' => 'teste',
    //     'email' => 'aeb@gmail.com',
    //     'password' => bcrypt('123456789')
    // ]);

    //Mass Update
    // $user = \App\User::find(43);
    // return $user->update([
    //     'name' => 'Atualizando com Mass Update',
    // ]);

    //$user = \App\User::find(4);
    //dd($user->store()->count());
    
    //$loja = \App\Store::find(1);
    //return $loja->products();

    // $categoria = \App\Category::find(1);
    // return $categoria->products;

    //criar uma loja para um usuário
    // $user = \App\User::find(10);
    // $store = $user->store()->create([
    //     'name' => 'Loja teste',
    //     'description' => 'Loja teste de produtos de informática',
    //     'mobile_phone' => 'XX',
    //     'phone' => 'XX-XXXX-XXXX',
    //     'slug' => 'loja-teste',
    // ]);

    //dd($store);

    //criar um produto para uma loja
    // $store = \App\Store::find(40);
    // $product = $store->products()->create([
    //     'name' => 'Notebook Dell',
    //     'description' => 'i5 8GB RAM',
    //     'body' => 'Compre ja!',
    //     'price' => 2999.00,
    //     'slug' => 'notebook-dell',
    // ]);

    //dd($product);
    //return \App\User::all();

    //criar uma categoria
    // \App\Category::create([
    //     'name' => 'Games',
    //     'description' => null,
    //     'slug' => 'games'
    // ]);

    // \App\Category::create([
    //     'name' => 'Notebooks',
    //     'description' => null,
    //     'slug' => 'notebooks'
    // ]);

    //return \App\Category::all();

    //adicionar um produto para uma categoria ou vice-versa
    $product = \App\Product::find(41);
    dd($product->categories()->sync([2])); //attach, detach
});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
        // Route::prefix('stores')->name('stores.')->group(function(){
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('create', 'StoreController@create')->name('create');
        //     Route::post('store', 'StoreController@store')->name('store');
        //     Route::get('{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
