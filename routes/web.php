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
})->name('welcome');

Route::get('/Users', 'UsersController@login');
Route::resource('dashboard', 'DashboardController');
Route::resource('organization', 'OrganizationController');
Route::resource('organization_unit', 'OrganizationUnitController');
//Route::resource('sector', 'SectorController');
Route::resource('sector', 'SsectorController');
Route::resource('subsector', 'SubsectorController');
Route::get('/subsector/ajax_get_subsector', 'SubsectorController@ajax_get_subsector');
Route::resource('role', 'RoleController');
Route::resource('official', 'OfficialController');
Route::resource('source', 'SourceController');
Route::resource('purpose', 'PurposeController');
Route::resource('contracttype', 'ContractTypeController');
Route::resource('tender_method', 'TenderMethodController');
Route::resource('contract_method', 'ContractMethodController');
Route::resource('currency', 'CurrencyController');
Route::resource('offerer', 'OffererController');
Route::resource('contact', 'ContactController');
Route::resource('status', 'StatusController');
Route::resource('project', 'ProjectController');

Route::get('catalog/subsector/{sectorID}', 'CatalogController@get_subsector');
Route::get('catalog/unit/{organizationID}', 'CatalogController@get_units');


Route::get('transparency/{organization?}/citizens', 'TransparencyController@citizens')->name('transparency.citizens');
Route::get('transparency/map', 'TransparencyController@map')->name('transparency.map');
Route::get('transparency/faq', 'TransparencyController@faq')->name('transparency.faq');
Route::post('transparency/project_states', 'TransparencyController@project_states')->name('transparency.project_states');
Route::get('transparency/project/{project_code}', 'TransparencyController@project')->name('transparency.project');
Route::get('transparency/project_managment/{project}/{track_engage}', 'TransparencyController@project_managment')->name('transparency.project_managment');
Route::post('transparency/search_results', 'TransparencyController@search_results')->name('transparency.results');

Route::get('temporal/transparency/project/{project_code}', 'TemporalController@project')->name('temporal.project');
Route::get('temporal/transparency/project_managment/{project}', 'TemporalController@project_managment')->name('temporal.project_managment');

Route::get('reports/adquisitions', 'ReportsController@adquisitions')->name('reports.adquisitions');
Route::get('reports/technicians', 'ReportsController@technicians')->name('reports.technicians');
Route::get('reports/suppliers', 'ReportsController@suppliers')->name('reports.suppliers');
Route::get('reports/managment', 'ReportsController@managment')->name('reports.managment');
Route::get('reports/download', 'ReportsController@download')->name('reports.download');

Route::resource('tender', 'TenderController');
Route::get('tender/{projectID}/create', 'TenderController@create');
Route::resource('award', 'AwardController');
Route::resource('contract', 'ContractController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
