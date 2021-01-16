<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
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

Route::get('/', 'PagesController@landing');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/login', 'AdminController@login');


Route::middleware(['session'])->group(function(){
    Route::get('/dashboard', 'PagesController@index');

Route::get('/profile', 'PagesController@profile');

// Konselor routes
    Route::get('/daftarkonseli', 'PagesController@daftarkonseli');
    Route::get('/arsip', 'PagesController@arsip');
    Route::get('/caseconference', 'PagesController@caseconference');

// Konseli routes
    Route::get('/daftarsesi', 'PagesController@daftarSesi');
    Route::get('/ruangkonseling', 'PagesController@ruangkonseling');

// Setups routes
    Route::get('/setup/caseconference', 'PagesController@conferenceSetup');
    Route::get('/setup/referral', 'PagesController@referralSetup');

});

// Admin routes
    Route::get('/admin/dashboard', 'AdminController@dashboard');

    Route::post('/admin/post', 'AdminController@doLogin');

// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');


Route::post('services/auth/login', 'UserController@login');
Route::post('services/auth/login/admin', 'UserController@adminLogin');
Route::post('services/auth/register', 'UserController@register');
Route::post('services/auth/siasat', 'UserController@siasatLogin');
Route::post('services/auth/changepassword', 'UserController@changePassword');


Route::get('services/jadwalkonselor', 'JadwalKonselorController@index');


Route::get('services/konseling/statistic', 'KonselingController@statistic');
Route::get('services/konseling/expired/candidate', 'KonselingController@checkExpired');
Route::get('services/konseling', 'KonselingController@index');
Route::get('services/konseling/count','KonselingController@count');
Route::post('services/konseling/end', 'KonselingController@end');
Route::get('services/konseling/{id}', 'KonselingController@show');
Route::post('services/konseling', 'KonselingController@create');

Route::get('services/conference', 'CaseConferenceController@index');
Route::get('services/conference/{id}', 'CaseConferenceController@show');
Route::post('services/conference/createagreement', 'CaseConferenceController@createAgreement');
Route::post('services/conference', 'CaseConferenceController@store');
Route::post('services/conference/declineagreement', 'CaseConferenceController@declideAgreement');

Route::post('services/rangkumankonseling', 'RangkumanKonselingController@store');

Route::get('services/chatconference', 'ChatConferenceController@index');
Route::get('services/chatconference/chat', 'ChatConferenceController@chat');
Route::get('services/chatconference/{id}', 'ChatConferenceController@show');
Route::post('services/chatconference', 'ChatConferenceController@store');
Route::put('services/chatconference', 'ChatConferenceController@update');

Route::get('services/detailconference/tes', 'DetailConferenceController@tes');
Route::get('services/detailconference', 'DetailConferenceController@index');
Route::get('services/detailconference/{id}', 'DetailConferenceController@show');
Route::post('services/detailconference', 'DetailConferenceController@store');

Route::get('services/referral', 'ReferalController@index');
Route::get('services/referral/{id}', 'ReferalController@show');
Route::post('services/referral', 'ReferalController@store');
Route::post('services/referral/createagreement', 'ReferalController@createAgreement');
Route::post('services/referral/declineagreement', 'ReferalController@declideAgreement');

Route::get('services/rekamkonseling', 'RekamKonselingController@show');
Route::post('services/rekamkonseling', 'RekamKonselingController@update');

Route::post('services/user/edit', 'UserController@editProfile');
Route::get('/logout', 'UserController@logout');


Route::get('services/notification', 'NotificationController@index');
Route::get('services/notification/{id}', 'NotificationController@show');
Route::get('services/notification/count/{id}', 'NotificationController@count');
Route::post('services/notification', 'NotificationController@store');
Route::put('services/notification/{id}', 'NotificationController@update');
Route::post('services/notification/read/{id}', 'NotificationController@read');


