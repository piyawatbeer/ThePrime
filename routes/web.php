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
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('profile', 'HomeController@profile');
    Route::get('formp/{id}', 'HomeController@renderFormp');
    Route::get('username_check', 'HomeController@usernameCheck');
    Route::patch('{id}', 'HomeController@update');
   
    Route::prefix('service')->group(function () {
        Route::get('', 'ServiceController@index');
        Route::get('survey', 'ServiceController@survey');
        Route::get('surveysend', 'ServiceController@surveysend');
        Route::get('datatablessurvey', 'ServiceController@datatablessurvey');
         Route::get('datatablessurveysend', 'ServiceController@datatablessurveysend');
        Route::post('add', 'ServiceController@store');
        Route::delete('{id}', 'ServiceController@delete');
        Route::delete('pledge/{id}', 'ServiceController@deletepledge');
        Route::get('pledge', 'ServiceController@pledge');
        Route::get('pledgeslips/{id}', 'ServiceController@pledgeslips');
        Route::get('datatablespledge', 'ServiceController@datatablespledge');
        Route::get('updatesurveyf/{id}', 'ServiceController@updatesurveyf');
        Route::post('update/{id}', 'ServiceController@updatesurvey');
        Route::get('surveyD/{id}', 'ServiceController@surveyD');
        Route::get('surveysendD/{id}', 'ServiceController@surveysendD');
        Route::get('pledgeD/{id}', 'ServiceController@pledgeD');
        Route::post('surveypic/{id}', 'ServiceController@surveypic');
        Route::post('surveyker/{id}', 'ServiceController@surveyker');
        Route::post('pledgestatusu/{id}', 'ServiceController@pledgestatusu');
        Route::post('surveystatusu/{id}', 'ServiceController@surveystatusu');
        Route::post('surveysendstatusu/{id}', 'ServiceController@surveysendstatusu');
        Route::post('slipsadd/{id}', 'ServiceController@slipsadd');
        Route::delete('pledgeslipsdel/{id}', 'ServiceController@pledgeslipsdel');
        Route::get('pledgeprint/{id}', 'ServiceController@pledgeprint');
        Route::get('surveyprint/{id}', 'ServiceController@surveyprint');
        Route::get('pledgestatus/{id}', 'ServiceController@renderForm');
        Route::get('surveystatus/{id}', 'ServiceController@renderFormsurvey');
         Route::get('surveysendstatus/{id}', 'ServiceController@renderFormsurveysend');
        Route::get('design', 'ServiceController@design');
        Route::get('waitprice', 'ServiceController@waitprice');
        Route::get('waitbuild', 'ServiceController@waitbuild');
        Route::get('build', 'ServiceController@build');
         Route::get('garuntee', 'ServiceController@garuntee');
         Route::get('endproject', 'ServiceController@endproject');
        Route::get('allproject', 'ServiceController@allproject');
         Route::get('working', 'ServiceController@working');
        Route::get('datatablesdesign', 'ServiceController@datatablesdesign');
        Route::get('datatableswaitprice', 'ServiceController@datatableswaitprice');
        Route::get('datatableswaitbuild', 'ServiceController@datatableswaitbuild');
        Route::get('datatablesbuild', 'ServiceController@datatablesbuild');
        Route::get('datatablesgaruntee', 'ServiceController@datatablesgaruntee');
        Route::get('datatablesendproject', 'ServiceController@datatablesendproject');
         Route::get('datatablesallproject', 'ServiceController@datatablesallproject');
          Route::get('datatablesworking', 'ServiceController@datatablesworking');
        Route::get('designD/{id}', 'ServiceController@designD');
        Route::get('waitpriceD/{id}', 'ServiceController@waitpriceD');
        Route::get('waitbuildD/{id}', 'ServiceController@waitbuildD');
        Route::get('buildD/{id}', 'ServiceController@buildD');
         Route::get('garunteeD/{id}', 'ServiceController@garunteeD');
          Route::get('endprojectD/{id}', 'ServiceController@endprojectD');
         Route::get('tworkerprint/{id}', 'ServiceController@tworkerprint');
        Route::get('buildprint/{id}', 'ServiceController@buildprint');
        Route::get('designaddf/{id}', 'ServiceController@designaddf');
        Route::post('designadd/{id}', 'ServiceController@designadd');
        Route::delete('designdel/{id}', 'ServiceController@designdel');
        Route::delete('designmentdel/{id}', 'ServiceController@designmentdel');
        Route::get('designmentf/{id}', 'ServiceController@designmentf');
        Route::post('designment/{id}', 'ServiceController@designment');
        Route::get('designstatus/{id}', 'ServiceController@designstatus');
        Route::get('waitpricestatus/{id}', 'ServiceController@waitpricestatus');
         Route::post('waitpricestatusu/{id}', 'ServiceController@waitpricestatusu');
        Route::get('waitbuildstatus/{id}', 'ServiceController@waitbuildstatus');
         Route::get('buildstatus/{id}', 'ServiceController@buildstatus');
          Route::get('garunteestatus/{id}', 'ServiceController@garunteestatus');
        Route::post('designstatusu/{id}', 'ServiceController@designstatusu');
        Route::post('waitbuildstatusu/{id}', 'ServiceController@waitbuildstatusu');
         Route::post('buildstatusu/{id}', 'ServiceController@buildstatusu');
         Route::post('garunteestatusu/{id}', 'ServiceController@garunteestatusu');
        Route::get('templatef/{id}', 'ServiceController@templatef');
        Route::post('templateadd/{id}', 'ServiceController@templateadd');
        Route::get('templatedata/{id}', 'ServiceController@templatedata');
        Route::get('templatetype/{id}', 'ServiceController@templatetype');
        Route::post('addtype/{id}', 'ServiceController@addtype');
        Route::get('deltype/{id}', 'ServiceController@deltype');
        Route::get('dellist/{id}', 'ServiceController@dellist');
        Route::get('templatelist/{id}', 'ServiceController@templatelist');
        Route::post('addlistboq/{id}', 'ServiceController@addlistboq');
        Route::post('templateupdate/{id}', 'ServiceController@templateupdate');
        Route::get('templateprint/{id}', 'ServiceController@templateprint');
        Route::get('templateprints/{id}', 'ServiceController@templateprints');
        Route::get('templatedifprint/{id}', 'ServiceController@templatedifprint');
    });
});

    Route::group(['middleware' => ['auth'],['admin']], function(){
    Route::prefix('company')->group(function () {
    Route::get('', 'CompanyController@index');
    Route::get('form/{id}', 'CompanyController@renderForm');
    Route::patch('{id}', 'CompanyController@update');
   
    // Route::get('view/{id}', 'CompanyController@view');

    });
     Route::prefix('bank')->group(function () {
    
    Route::get('', 'BankController@index');
    Route::get('form/{id}', 'BankController@renderForm');
    Route::patch('{id}', 'BankController@update');
    Route::get('datatables', 'BankController@getDatatables');
    Route::post('', 'BankController@store');
    Route::post('uploadfile', 'BankController@uploadfile');
    Route::delete('{id}', 'BankController@delete');
    Route::get('cancle/{id}', 'BankController@deletestorepic');

    // Route::get('view/{id}', 'CompanyController@view');

    });
 
    Route::prefix('user')->group(function () {
        // Route::get('profile', 'UserController@profile');
        Route::get('', 'UserController@index');
        Route::post('', 'UserController@store');
        Route::patch('{id}', 'UserController@update');
        Route::delete('{id}', 'UserController@delete');
        Route::get('datatables', 'UserController@getDatatables');
        Route::get('form/{id}', 'UserController@renderForm');
        // Route::get('formp/{id}', 'UserController@renderFormp');
        Route::get('username_check', 'UserController@usernameCheck');
        Route::get('view/{id}', 'UserController@view');
    });
    Route::prefix('work')->group(function () {
        Route::get('', 'WorkController@index');
        Route::post('', 'WorkController@store');
        Route::patch('{id}', 'WorkController@update');
        Route::delete('{id}', 'WorkController@delete');
        Route::get('datatables', 'WorkController@getDatatables');
        Route::get('form/{id}', 'WorkController@renderForm');
    });
    Route::prefix('categorysub')->group(function () {
        Route::get('', 'CategorysubController@index');
        Route::get('group/{id}', 'CategorysubController@findGroup');
        Route::get('category/{id}', 'CategorysubController@findCategory');
        Route::get('categoryfind/{id}', 'CategorysubController@findCategorysub');
        Route::post('', 'CategorysubController@store');
        Route::patch('{id}', 'CategorysubController@update');
        Route::delete('{id}', 'CategorysubController@delete');
        Route::get('print', 'CategorysubController@print');
        Route::get('datatables', 'CategorysubController@getDatatables');
        Route::get('form/{id}', 'CategorysubController@renderForm');
    });
    Route::prefix('typesub')->group(function () {
        Route::get('', 'TypesubController@index');
        Route::get('group/{id}', 'TypesubController@findGroup');
        Route::get('typefind/{id}', 'TypesubController@findtype');
        Route::get('category/{id}', 'TypesubController@findCategory');
        Route::get('categoryfind/{id}', 'TypesubController@findCategorysub');
        Route::post('', 'TypesubController@store');
        Route::patch('{id}', 'TypesubController@update');
        Route::delete('{id}', 'TypesubController@delete');
        Route::get('datatables', 'TypesubController@getDatatables');
        Route::get('form/{id}', 'TypesubController@renderForm');
    });

     Route::prefix('boq')->group(function () {
        Route::get('', 'BoqController@index');
        Route::get('group/{id}', 'BoqController@findGroup');
        Route::get('typefind/{id}', 'BoqController@findtype');
        Route::get('typefinds/{id}', 'BoqController@findtypes');
        Route::get('typesubfind/{id}', 'BoqController@findtypesub');
        Route::get('category/{id}', 'BoqController@findCategory');
        Route::get('categoryfind/{id}', 'BoqController@findCategorysub');
        Route::post('', 'BoqController@store');
        Route::patch('{id}', 'BoqController@update');
        Route::delete('{id}', 'BoqController@delete');
        Route::get('datatables', 'BoqController@getDatatables');
        Route::get('historytable', 'BoqController@historyDatatables');
        Route::get('form/{id}', 'BoqController@renderForm');
        Route::get('change/{id}', 'BoqController@renderFormChange');
        Route::get('boqhistory/', 'BoqController@history');
        Route::post('addchange', 'BoqController@storeChange');
    });
     Route::prefix('options')->group(function () {
        Route::get('', 'OptionsController@index');
        Route::post('add', 'OptionsController@store');
        Route::post('{id}', 'OptionsController@update');
        Route::delete('{id}', 'OptionsController@delete');
        Route::get('datatables', 'OptionsController@getDatatables');
        Route::get('datatables2', 'OptionsController@getDatatables2');
        Route::get('datatables3', 'OptionsController@getDatatables3');
        Route::get('form/{id}', 'OptionsController@renderForm');
        Route::get('data/{id}', 'OptionsController@data');
        Route::get('type/{id}', 'OptionsController@renderFormtype');
        Route::post('addtype/{id}', 'OptionsController@storetype');
        Route::get('deltype/{id}', 'OptionsController@deltype');
        Route::get('dellist/{id}', 'OptionsController@dellist');
        Route::get('listboq/{id}', 'OptionsController@listboq');
        Route::post('addlistboq/{id}', 'OptionsController@storelistboq');
    });


         });
