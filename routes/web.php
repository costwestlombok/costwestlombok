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
    return view('metronic.dashboard');
    return view('auth.login');
})->name('welcome');

Route::get('home', function () {
    return view('metronic.dashboard');
})->name('home');

Route::get('/list', 'FrontController@list');

Route::get('/Users', 'UsersController@login');
Route::resource('dashboard', 'DashboardController');

// catalog
Route::resource('catalog/organization', 'OrganizationController');
Route::resource('catalog/organization_unit', 'OrganizationUnitController');
Route::resource('catalog/official', 'OfficialController');
Route::resource('catalog/role', 'RoleController');
Route::resource('catalog/sector', 'SectorController');
Route::resource('catalog/subsector', 'SubsectorController');
Route::resource('catalog/source', 'SourceController');
Route::resource('catalog/purpose', 'PurposeController');
Route::resource('catalog/contracttype', 'ContractTypeController');
Route::resource('catalog/offerer', 'OffererController');
Route::resource('catalog/tender_method', 'TenderMethodController');
Route::resource('catalog/contract_method', 'ContractMethodController');
Route::resource('catalog/warranty-type', 'WarrantyTypeController');
Route::resource('catalog/status', 'StatusController');
Route::resource('catalog/tender-status', 'TenderStatusController');

Route::get('/subsector/ajax_get_subsector', 'SubsectorController@ajax_get_subsector');
Route::resource('currency', 'CurrencyController');
Route::resource('contact', 'ContactController');

Route::resource('project', 'ProjectController');
Route::get('/project/file/{project}', 'ProjectController@project_file');
Route::post('/project/file-store', 'ProjectController@store_file');
Route::delete('/project/file/destroy/{projectdocument}', 'ProjectController@project_file_delete');

Route::get('/get-unit/{entity}', 'OrganizationUnitController@get_unit');
Route::get('/get-official/{unit}', 'OfficialController@get_official');
Route::get('/get-subsector/{sector}', 'SubsectorController@get_subsector');

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
Route::get('/tender-offerer/{tender}', 'TenderOffererController@index');
Route::post('/tender-offerer', 'TenderOffererController@store');
Route::delete('/tender-offerer/{tender}', 'TenderOffererController@destroy');
Route::get('/get-supplier/{award}', 'TenderOffererController@get_sup');

// Route::get('tender/{projectID}/create', 'TenderController@create');
Route::resource('award', 'AwardController');
Route::resource('contract', 'ContractController');
//completions
Route::get('/completions/{contract}', 'ContractController@completion');
Route::post('/completion', 'ContractController@completion_store');
Route::delete('/completions/destroy/{completion}', 'ContractController@completion_destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//contract-management
Route::resource('ammendment', 'AmmendmentController');

//execution
Route::resource('execution', 'ExecutionController');

//disbursment
Route::get('/disbursment/{execution}', 'ExecutionController@disbursment');
Route::post('/disbursment', 'ExecutionController@disbursment_store');
Route::delete('/disbursment/delete/{disbursment}', 'ExecutionController@disbursment_destroy');

//warranty
Route::get('/warranty/{execution}', 'ExecutionController@warranty');
Route::post('/warranty', 'ExecutionController@warranty_store');

Route::resource('progress', 'ProgressController');
Route::get('/advance-images/{advance}', 'ProgressController@images');
Route::post('/advance-images/{advance}', 'ProgressController@images_store');
Route::delete('/advance-image/destroy/{advance_image}', 'ProgressController@image_destroy');
