<?php

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

Route::get('/', 'WelcomeController@index');
Route::get('/film-details/{slug}', 'WelcomeController@filmDetails');
Route::get('/category-blog/{id}', 'WelcomeController@categoryBlog');



Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');



Route::get('/xyz', 'AdminController@index');
Route::post('/admin_login', 'AdminController@adminLogin');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout', 'SuperAdminController@logout');

Route::get('/add-genre', 'GenreController@addGenre');
Route::post('/save-genre', 'GenreController@saveGenre');
Route::get('/manage-genre', 'GenreController@manageGenre');
Route::get('/delete-genre/{id}', 'GenreController@deleteGenre');
Route::get('/edit-genre/{id}', 'GenreController@editGenre');
Route::post('/update-genre', 'GenreController@updateGenre');
Route::get('/delete-genre/{id}', 'GenreController@deleteGenre');


Route::get('/add-film', 'FilmController@addFilm');
Route::post('/save-film', 'FilmController@saveFilm');
Route::get('/manage-film', 'FilmController@manageFilm');
Route::get('/edit-film/{id}', 'FilmController@editFilm');
Route::post('/update-film', 'FilmController@updateFilm');
Route::get('/delete-film/{id}', 'FilmController@deleteFilm');