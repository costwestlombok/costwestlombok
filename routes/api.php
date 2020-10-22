<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('organization', 'OrganizationController@api');
Route::get('organization/{organization}/delete', 'OrganizationController@destroy');

Route::get('organization_unit', 'OrganizationUnitController@api');
Route::get('organization_unit/{organizationUnit}/delete', 'OrganizationUnitController@destroy');

Route::get('official', 'OfficialController@api');
Route::get('official/{official}/delete', 'OfficialController@destroy');

Route::get('role', 'RoleController@api');
Route::get('role/{role}/delete', 'RoleController@destroy');

Route::get('sector', 'SectorController@api');
Route::get('sector/{sector}/delete', 'SectorController@destroy');

Route::get('subsector', 'SubsectorController@api');
Route::get('subsector/{subsector}/delete', 'SubsectorController@destroy');

Route::get('source', 'SourceController@api');
Route::get('source/{source}/delete', 'SourceController@destroy');

Route::get('purpose', 'PurposeController@api');
Route::get('purpose/{purpose}/delete', 'PurposeController@destroy');

Route::get('contract_type', 'ContractTypeController@api');
Route::get('contract_type/{contract_type}/delete', 'ContractTypeController@destroy');

Route::get('offerer', 'OffererController@api');
Route::get('offerer/{offerer}/delete', 'OffererController@destroy');

Route::get('tender_method', 'TenderMethodController@api');
Route::get('tender_method/{tender_method}/delete', 'TenderMethodController@destroy');

Route::get('contract_method', 'ContractMethodController@api');
Route::get('contract_method/{contract_method}/delete', 'ContractMethodController@destroy');

Route::get('warranty-type', 'WarrantyTypeController@api');
Route::get('warranty-type/{warranty_type}/delete', 'WarrantyTypeController@destroy');

Route::get('status', 'StatusController@api');
Route::get('status/{status}/delete', 'StatusController@destroy');

Route::get('tender-offerer', 'TenderOffererController@api');

Route::get('ammendment/{contract}', 'AmmendmentController@api');
Route::get('ammendment/{ammendment}/delete', 'AmmendmentController@destroy');

Route::get('disbursment/{execution}', 'ExecutionController@api');
Route::get('warranty/{execution}', 'ExecutionController@api_warranty');

Route::get('project-document', 'ProjectController@api');
Route::get('budget-source', 'BudgetController@api');
Route::get('advance-image', 'ProgressController@api');
Route::get('contact', 'ContactController@api');

Route::get('project/{project}/delete', 'ProjectController@destroy');
Route::get('project-file/{projectdocument}/delete', 'ProjectController@project_file_delete');
Route::get('tender/{tender}/delete', 'TenderController@destroy');
Route::get('award/{award}/delete', 'AwardController@destroy');
Route::get('contract/{contract}/delete', 'ContractController@destroy');
Route::get('ammendment/{ammendment}/delete', 'AmmendmentController@destroy');
Route::get('execution/{execution}/delete', 'ExecutionController@destroy');
