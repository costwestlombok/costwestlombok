<?php

use App\Http\Controllers\AmmendmentController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CompletionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractMethodController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\ExecutionController;
use App\Http\Controllers\OffererController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationUnitController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubsectorController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\TenderMethodController;
use App\Http\Controllers\TenderOffererController;
use App\Http\Controllers\WarrantyTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('organization', [OrganizationController::class, 'api']);
Route::get('organization/{organization}/delete', [OrganizationController::class, 'destroy']);

Route::get('organization_unit', [OrganizationUnitController::class, 'api']);
Route::get('organization_unit/{organizationUnit}/delete', [OrganizationUnitController::class, 'destroy']);

Route::get('official', [OfficialController::class, 'api']);
Route::get('official/{official}/delete', [OfficialController::class, 'destroy']);

Route::get('role', [RoleController::class, 'api']);
Route::get('role/{role}/delete', [RoleController::class, 'destroy']);

Route::get('sector', [SectorController::class, 'api']);
Route::get('sector/{sector}/delete', [SectorController::class, 'destroy']);

Route::get('subsector', [SubsectorController::class, 'api']);
Route::get('subsector/{subsector}/delete', [SubsectorController::class, 'destroy']);

Route::get('source', [SourceController::class, 'api']);
Route::get('source/{source}/delete', [SourceController::class, 'destroy']);

Route::get('purpose', [PurposeController::class, 'api']);
Route::get('purpose/{purpose}/delete', [PurposeController::class, 'destroy']);

Route::get('contract_type', [ContractTypeController::class, 'api']);
Route::get('contract_type/{contract_type}/delete', [ContractTypeController::class, 'destroy']);

Route::get('offerer', [OffererController::class, 'api']);
Route::get('offerer/{offerer}/delete', [OffererController::class, 'destroy']);

Route::get('tender_method', [TenderMethodController::class, 'api']);
Route::get('tender_method/{tender_method}/delete', [TenderMethodController::class, 'destroy']);

Route::get('contract_method', [ContractMethodController::class, 'api']);
Route::get('contract_method/{contract_method}/delete', [ContractMethodController::class, 'destroy']);

Route::get('warranty-type', [WarrantyTypeController::class, 'api']);
Route::get('warranty-type/{warranty_type}/delete', [WarrantyTypeController::class, 'destroy']);

Route::get('status', [StatusController::class, 'api']);
Route::get('status/{status}/delete', [StatusController::class, 'destroy']);

Route::get('tender-offerer', [TenderOffererController::class, 'api']);

Route::get('ammendment/{contract}', [AmmendmentController::class, 'api']);
Route::get('ammendment/{ammendment}/delete', [AmmendmentController::class, 'destroy']);

Route::get('disbursment/{disbursment}/delete', [ExecutionController::class, 'disbursment_destroy']);
Route::get('disbursment/{execution}', [ExecutionController::class, 'api']);
Route::get('warranty/{execution}', [ExecutionController::class, 'api_warranty']);

Route::get('project-document', [ProjectController::class, 'api']);
Route::get('budget-source', [BudgetController::class, 'api']);
Route::get('budget/{budget}/source', [BudgetController::class, 'sourceApi']);
Route::get('advance-image', [ProgressController::class, 'api']);
Route::get('contact', [ContactController::class, 'api']);
Route::get('contact/{contact}/delete', [ContactController::class, 'destroy']);

Route::get('project/{project}/delete', [ProjectController::class, 'destroy']);
Route::get('project-file/{projectdocument}/delete', [ProjectController::class, 'project_file_delete']);
Route::get('tender/{tender}/offerer', [TenderController::class, 'offerer']);
Route::get('tender/{tender}/delete', [TenderController::class, 'destroy']);
Route::get('award/{award}/delete', [AwardController::class, 'destroy']);
Route::get('contract/{contract}/delete', [ContractController::class, 'destroy']);
Route::get('ammendment/{ammendment}/delete', [AmmendmentController::class, 'destroy']);
Route::get('execution/{execution}/delete', [ExecutionController::class, 'destroy']);

Route::get('completion/{completion}/delete', [CompletionController::class, 'destroy']);
Route::get('advance/{advance}/image', [ProgressController::class, 'imageApi']);

Route::get('banner', [BannerController::class, 'api']);
Route::get('banner/{banner}/delete', [BannerController::class, 'destroy']);
