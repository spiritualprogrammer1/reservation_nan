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


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/homess', function (){
//    return view('auth.log');
//})->name('home');


Auth::routes();
Route::get('profile.nan',function(){
    return view('user.profile');
});
Route::post('savenewuser','UserController@savenewuser')->name('savenewuser');
Route::get('profile.nan','UserController@profile')->name('profile.nan');
Route::post('profilesave','UserController@updatepassword')->name('profilesave');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashabord.nan', 'HomeController@dashabord');
Route::get('/mac', 'MacController@index');
Route::get('/mac/{mac}/editer-info-mac', 'MacController@edit');
Route::get('/mac/{mac}/visioner-info-mac', 'MacController@show');
Route::get('/mac/{mac}/effacer-info-mac', 'MacController@destroy');
Route::put('/mac/{mac}/modifier-info-mac', 'MacController@update')->name('mac.update');
Route::post('/mac/ajouter-un-mac', 'MacController@store')->name('mac.store');

Route::get('/jour', 'DayController@index');
Route::get('/jour/{day}/voir-jour', 'DayController@show');
Route::get('/jour/{day}/effacer-jour', 'DayController@destroy');

Route::get('/periode', 'PeriodeController@index');
Route::get('/periode/{periode}/editer-info', 'PeriodeController@edit');
Route::get('/periode/{periode}/visioner-info', 'PeriodeController@show');
Route::get('/periode/{periode}/effacer-info', 'PeriodeController@destroy');
Route::put('/periode/{periode}/modifier-info', 'PeriodeController@update')->name('periode.update');
Route::post('/periode/ajouter-une-periode', 'PeriodeController@store')->name('periode.store');

Route::get('/periode-jour', 'PeriodeJourController@index');
Route::get('/periode-jour/{periodeJour}/voir-periode-du-jour', 'PeriodeJourController@show');
Route::get('/periode-jour/{periodeJour}/effacer-periode-du-jour', 'PeriodeJourController@destroy');
Route::get('/periode-jour/{periodeJour}/edit-periode-du-jour', 'PeriodeJourController@editer');
Route::put('/periode-jours/{periodeJour}/update-periode-du-jour','PeriodeJourController@updates')->name('periodejour.update');

Route::get('/range', 'RangeController@index');
Route::get('/range/{range}/editer-info', 'RangeController@edit');
Route::get('/range/{range}/visioner-info', 'RangeController@show');
Route::get('/range/{range}/effacer-info', 'RangeController@destroy');
Route::put('/range/{range}/modifier-info', 'RangeController@update')->name('range.update');
Route::post('/range/ajouter-un-range', 'RangeController@store')->name('range.store');

Route::get('/type_user', 'TypeUserController@index');
Route::get('/type_user/{typeUser}/editer-info', 'TypeUserController@edit');
Route::get('/type_user/{typeUser}/visioner-info', 'TypeUserController@show');
Route::get('/type_user/{typeUser}/effacer-info', 'TypeUserController@destroy');
Route::put('/type_user/{typeUser}/modifier-info', 'TypeUserController@update')->name('type_user.update');
Route::post('/type_user/ajouter-un-range', 'TypeUserController@store')->name('type_user.store');



Route::post('/reserver','UserMacController@store');
Route::get('/reservation/{periodeJour}/liste-mac-disponible', 'UserMacController@showPeriode')->name('reservation-liste');
Route::get('/reservation.nan','UserMacController@index');
Route::get('/reservation/{userMac}/effacer-info','UserMacController@destroy');
Route::get('/reservation/{userMac}/visioner-info','UserMacController@show');
Route::get('/reservation/mes-reservation','UserMacController@mesReservation')->name('mesreservation');
Route::get('/reservation/mes-reservation-du-jour','UserMacController@mesReservationJour')->name('mesreservation-jour');
Route::get('/reservation/mes-reservation-de-la-semaine','UserMacController@mesReservationSemaine')->name('mesreservation-semaine');
Route::get('/reservation/mes-reservation-faite-aujourd-hui','UserMacController@mesReservationToday')->name('mesreservation-today');
Route::get('reservationsearch/{id}','UserMacController@reservationsearch');
Route::get('reservationsearchcantine','UserMacController@reservationsearchcantine');


Route::get('/reservation/reservation-sans-mac','UserMacController@reservationSansMac')->name('reservation-sans-mac');
Route::get('/reservation/les-reservation-du-jour-pour-tous','UserMacController@mesReservationJourEveryOne')->name('mesreservation-jour-everyone');
Route::get('/reservation/les-reservation-de-la-semaine-pour-tous','UserMacController@mesReservationSemaineEveryOne')->name('mesreservation-semaine-everyone');
Route::get('/reservation/les-reservation-faite-aujourd-hui-pour-tous','UserMacController@mesReservationTodayEveryOne')->name('mesreservation-today-everyone');




Route::get('newreservation.nan','HomeController@index');


Route::get('/user', 'UserController@index');
Route::get('/user/{user}/editer-info', 'UserController@edit');
Route::get('/user/{user}/visioner-info', 'UserController@show');
Route::get('/user/{user}/effacer-info', 'UserController@destroy');
Route::put('/user/{user}/modifier-info', 'UserController@update')->name('user.update');
Route::post('/user/ajouter-un-range', 'UserController@store')->name('user.store');
Route::post('newusers','UserController@newusers')->name('newusers');

Route::put('/updateusers/{user}','UserController@updateusers')->name('updateusers');
Route::get('newuser','UserController@newuser');


Route::get('passwordreset.nan','UserController@passwordresetnan');
Route::post('passwordreset','UserController@passwordreset')->name('passwordreset');


