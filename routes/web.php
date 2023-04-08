<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api/v1/mahasiswa'], function() use ($router){
	$router->get('/', ['uses' => 'API\\MahasiswaController@index']);
    $router->post('/', ['uses' => 'API\\MahasiswaController@store']);
    $router->put('/{id}', ['uses' => 'API\\MahasiswaController@update']);
	$router->delete('/{id}', ['uses' => 'API\\MahasiswaController@destroy']);
});

$router->group(['prefix' => 'api/v1'], function() use ($router){
	$router->get('/', ['uses' => 'UserController@index']);
	$router->post('/', 'UserController@store');
	$router->get('/{id}', ['uses' => 'UserController@show']);
	$router->delete('/{id}', ['uses' => 'UserController@destroy']);
	$router->put('/{id}', ['uses' => 'UserController@update']);
});

$router->group(['prefix' => 'api/v1'], function() use ($router){
	$router->post('/login', ['uses' => 'API\\AuthController@login']);
	$router->post('/register', ['uses' => 'API\\AuthController@register']);
});



$router->get('/', function () use ($router) {
    return view('login');
});



$router->get('/dashboard', function () use ($router) {
	$mahasiswa = Mahasiswa::all()->count();
	$lulus = Mahasiswa::where('status',1)->get()->count();
    return view('dashboard.index', ['title' => 'Dashboard', 'count' => $mahasiswa, 'lulus' => $lulus]);
});

// $app->group(['middleware' => 'auth'], function () use ($app) {})

$router->group(['prefix' => 'mahasiswa'] ,function() use ($router){
		$router->get('/', 'MahasiswaController@index');
		$router->get('/create', 'MahasiswaController@create');
		$router->post('/create', 'MahasiswaController@store');
		$router->get('/edit/{id}', function ($id) use ($router) {
			$mahasiswa = Mahasiswa::find($id);
			$jurusan = ["Teknik Informatika", "Sistem Informasi", "Hukum", "Sastra", "Politik", "Psikologi"];
			return view('mahasiswa.edit', ['title' => 'Edit Page', 'mahasiswa' => $mahasiswa, 'jurusan' => $jurusan]);
		});
		$router->post('/edit/{id}', 'MahasiswaController@update');
		$router->delete('/delete/{id}', 'MahasiswaController@destroy');
});

$router->post('/login', ['uses' => 'AuthController@login']);

// $router->get('/mahasiswa', function () use ($router) {
//     return view('mahasiswa.index', ['title' => 'Data Mahasiswa']);
// });




// $router->post('/', 'AuthController@index');