<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//topページを変更する
Route::get('/', 'TopController@top');


// /helloというパスへのリクエストを、HelloControllerのindexアクションルーティングする様設定
//コントローラーを使用する場合は第２引数に「呼び出すコントローラーとアクション」を指定し、「コントローラー名＠アクション名」というように「＠」で連結して記述
Route::get('/hello', 'HelloController@index');

//topページを呼び出す
Route::get('/top', 'TopController@top')->name('top');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@about');

Route::resource('meetings', 'MeetingController')->middleware('verified');

//メール認証済みユーザーのみのアクセス
Route::group(['middleware' => ['auth','verified']], function () {

});

Route::resource('give_opinions', 'GiveOpinionController')->middleware('verified');

Route::get('opinions', 'OpinionsController@index')->name('opinions');

Route::get('teach', 'TeachController@index');

//入力
Route::get('/contact', 'ContactController@index')->name('contact.index')->middleware('verified');
//確認
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm')->middleware('verified');
//送信完了ページ
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send')->middleware('verified');

Route::get('coin/balance', 'CoinController@index')->name('coin.index')->middleware('verified');

Route::post('coin/confirm', 'CoinController@confirm')->name('coin.confirm')->middleware('verified');

Route::post('coin/thanks', 'CoinController@send')->name('coin.send')->middleware('verified');

Route::post('/give_opinions/delete/{id}', 'GiveOpinionController@delete');

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

Route::get('mypage', 'MyPageController@index')->name('mypage');
//メッセージテスト
Route::get('message', 'BoardsController@index')->name('message.index');
Route::get('message/message', 'BoardsController@show')->name('message.message');
Route::get('message/confirm', 'BoardsController@confirm')->name('message.confirm');

//for dm-page
Route::get('dm', 'DMController@index')->name('dm');
Route::post('dm/thanks', 'DMController@send')->name('dm.send');
