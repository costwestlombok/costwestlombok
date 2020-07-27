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
Route::get('organization/{organization}/delete', 'OrganizationController@deleteApi');

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
