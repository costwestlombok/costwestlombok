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

Route::get('/', 'FrontController@index');

Route::get('home', function () {
    if (Auth::check()) {
        return redirect('dashboard');
    }
    return redirect('/');
})->name('home');

Route::get('/get-entity', 'OrganizationController@get_entity');

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
Route::resource('catalog/contract_type', 'ContractTypeController');
Route::resource('catalog/offerer', 'OffererController');
Route::resource('catalog/tender_method', 'TenderMethodController');
Route::resource('catalog/contract_method', 'ContractMethodController');
Route::resource('catalog/warranty-type', 'WarrantyTypeController');
Route::resource('catalog/status', 'StatusController');
Route::resource('catalog/tender-status', 'TenderStatusController');

Route::get('/subsector/ajax_get_subsector', 'SubsectorController@ajax_get_subsector');
Route::resource('currency', 'CurrencyController');
Route::resource('catalog/contact', 'ContactController');

Route::resource('project', 'ProjectController');
Route::get('/project-file/{project}', 'ProjectController@project_file');
Route::post('/project-file', 'ProjectController@store_file');
Route::delete('/project/file/destroy/{projectdocument}', 'ProjectController@project_file_delete');

Route::get('project/{project}/tender', 'TenderController@index_tender')->name('project.tender.index');
Route::get('project/{project}/tender/create', 'TenderController@create_tender')->name('project.tender.create');
Route::get('project/{project}/file', 'ProjectController@project_file')->name('project.file.index');
// Route::get('project/{project}/file/create', 'TenderController@create_tender')->name('project.file.create');
Route::get('tender/{tender}/award', 'TenderController@award')->name('tender.award.index');
Route::get('tender/{tender}/award/create', 'TenderController@awardCreate')->name('tender.award.create');

// contract
Route::get('contract/{contract}/ammendment', 'ContractController@ammendment')->name('contract.ammendment.index');
Route::get('contract/{contract}/ammendment/create', 'ContractController@ammendmentCreate')->name('contract.ammendment.create');

Route::get('contract/{contract}/execution', 'ContractController@execution')->name('contract.execution.index');
Route::get('contract/{contract}/execution/create', 'ContractController@executionCreate')->name('contract.execution.create');

Route::get('contract/{contract}/completion', 'ContractController@completion')->name('contract.completion.index');
Route::get('contract/{contract}/completion/create', 'ContractController@completionCreate')->name('contract.completion.create');
Route::resource('completion', 'CompletionController');

Route::resource('contract', 'ContractController');

//budget
Route::get('/project-budget/{project}', 'BudgetController@index');
Route::get('/project-budget/{project}/create', 'BudgetController@create');
Route::get('/project-budget/{budget}/edit', 'BudgetController@edit');
Route::patch('/project-budget/{budget}/update', 'BudgetController@update');
Route::get('/project-budget/{budget}/delete', 'BudgetController@destroy');
Route::post('/project-budget', 'BudgetController@store');
Route::get('/budget-source/{budget}', 'BudgetController@source');
Route::get('/budget-source/{project_source}/delete', 'BudgetController@destroy_source');
Route::post('budget-source', 'BudgetController@store_project_source');

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

//tender
Route::resource('tender', 'TenderController');
Route::get('/project-tender/{project}', 'TenderController@index_tender');
Route::get('tender-create/{project}', 'TenderController@create_tender');

Route::get('/tender-offerer/{tender}', 'TenderOffererController@index');
Route::post('/tender-offerer', 'TenderOffererController@store');
Route::get('/tender-offerer/{tender}/delete', 'TenderOffererController@destroy');
Route::get('/get-supplier/{award}', 'TenderOffererController@get_sup');

// Route::get('tender/{projectID}/create', 'TenderController@create');
Route::resource('award', 'AwardController');
Route::get('tender-award/{tender}', 'AwardController@award');
Route::get('award-create/{tender}', 'AwardController@create_award');

Route::get('contract-create/{award}', 'ContractController@create_contract');
// Route::get('contract/{contract}/{award}/edit', 'ContractController@edit');

//completions
Route::get('/contract-completion/{completion}', 'ContractController@completion');
Route::get('/contract-completion/{contract}/create', 'ContractController@completion_create');
Route::get('/contract-completion/{completion}/edit', 'ContractController@completion_edit');
Route::patch('/contract-completion/{completion}/update', 'ContractController@completion_update');
Route::post('/contract-completion', 'ContractController@completion_store');
Route::get('/contract-completion/{completion}/delete', 'ContractController@completion_destroy');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//contract-management
Route::resource('ammendment', 'AmmendmentController');
Route::get('contract-ammendment/{contract}', 'AmmendmentController@ammendment');
Route::get('contract-ammendment/{contract}/create', 'AmmendmentController@create_ammendment');

//execution
Route::resource('execution', 'ExecutionController');
Route::get('contract-execution/{execution}', 'ExecutionController@execution');
Route::get('contract-execution/{contract}/create', 'ExecutionController@create_execution');

//disbursment
Route::get('/disbursment/{execution}/create', 'ExecutionController@disbursment');
Route::get('/disbursment/{disbursment}/edit', 'ExecutionController@disbursment_edit');
Route::patch('/disbursment/{disbursment}/update', 'ExecutionController@disbursment_update');
Route::post('/disbursment', 'ExecutionController@disbursment_store');
Route::get('/disbursment/{disbursment}/delete', 'ExecutionController@disbursment_destroy');

//warranty
Route::get('/warranty/{execution}', 'ExecutionController@warranty');
Route::get('/warranty/{execution}/create', 'ExecutionController@create_warranty');
Route::get('/warranty/{warranty}/edit', 'ExecutionController@edit_warranty');
Route::patch('/warranty/{warranty}/update', 'ExecutionController@update_warranty');
Route::get('/warranty/{warranty}/delete', 'ExecutionController@destroy_warranty');
Route::post('/warranty', 'ExecutionController@warranty_store');

Route::resource('progress', 'ProgressController');
Route::get('project-progress/{project}', 'ProgressController@progress');
Route::get('project-progress/{project}/create', 'ProgressController@create_progress');
Route::get('project-progress/{progress}/delete', 'ProgressController@destroy');
Route::post('project-progress', 'ProgressController@store');

Route::get('/advance-images/{advance}', 'ProgressController@images');
Route::post('/advance-images/{advance}', 'ProgressController@images_store');
Route::get('/advance-image/{advance_image}/delete', 'ProgressController@image_destroy');

//get-typeahed
Route::get('/get-contract-type', 'ContractTypeController@get_data');
Route::get('/get-contract-method', 'ContractMethodController@get_data');
Route::get('/get-tender-method', 'TenderMethodController@get_data');
Route::get('/get-tender-status', 'TenderStatusController@get_data');
Route::get('/get-status', 'StatusController@get_data');
Route::get('/get-role', 'RoleController@get_data');
Route::get('/get-warranty-type', 'WarrantyTypeController@get_data');
Route::get('/get-source', 'SourceController@get_data');
