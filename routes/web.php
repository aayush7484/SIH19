<?php
use App\Pollution;

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

Route::get('/redirect/{service}', 'SocialAuthController@redirect');
Route::get('/callback/{service}', 'SocialAuthController@callback');

Route::get('/issue/create', function () {
    $pollutions = Pollution::all()->sortBy('name');
    return view('user.add-issue')->with(compact('pollutions'));
})->name('userCreateIssue');

Route::post('issue', 'IssueController@store')->name('issue.store');

Route::get('issues', 'IssueController@index');

Route::get('issues/{issue}/edit', 'IssueController@edit');

Route::put('issues/{issue}/update', 'IssueController@update');

Route::delete('issues/{issue}/delete', 'IssueController@delete')->name('issue.destroy');