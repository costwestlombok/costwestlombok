<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AmmendmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractMethodController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExecutionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\OffererController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationUnitController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubsectorController;
use App\Http\Controllers\TemporalController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\TenderMethodController;
use App\Http\Controllers\TenderOffererController;
use App\Http\Controllers\TenderStatusController;
use App\Http\Controllers\TransparencyController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WarrantyTypeController;
use Illuminate\Support\Facades\Auth;
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
Route::get('oc4ids', [FrontController::class, 'oc4ids']);
Route::get('oc4ids/project/{project_oc4ids_id}', [FrontController::class, 'project']);
Route::get('oc4ids/project/{project_oc4ids_id}/budget', [FrontController::class, 'projectBudget']);
Route::get('oc4ids/project/{project_oc4ids_id}/parties', [FrontController::class, 'projectParties']);
Route::get('oc4ids/project/{project_oc4ids_id}/publicAuthority', [FrontController::class, 'projectPublicAuthority']);
Route::get('oc4ids/project/{project_oc4ids_id}/contractingProcesses', [FrontController::class, 'projectContractingProcesses']);
Route::get('oc4ids/project/{project_oc4ids_id}/documents', [FrontController::class, 'projectDocuments']);

Route::get('helper/duration', [HelperController::class, 'duration']);

Route::get('lang/{language}', [LocalizationController::class, 'switch'])->name('localization.switch');
Route::get('', [FrontController::class, 'index']);
Route::get('documentation', [FrontController::class, 'documentation']);
Route::get('publication-policy', [FrontController::class, 'publicationPolicy']);

Route::get('home', function () {
    if (Auth::check()) {
        return redirect('dashboard');
    }
    return redirect('/');
})->name('home');

Route::get('get-entity', [OrganizationController::class, 'get_entity']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Auth::routes(['register' => false]);

Route::resource('project', ProjectController::class);
Route::get('project/{project}/tender', [TenderController::class, 'index_tender'])->name('project.tender.index');
Route::get('project/{project}/file', [ProjectController::class, 'project_file'])->name('project.file.index');
Route::get('project-file/{project}', [ProjectController::class, 'project_file']);
Route::get('project-budget/{project}', [BudgetController::class, 'index']);
Route::get('budget-source/{budget}', [BudgetController::class, 'source']);
Route::get('tender/{tender}/award', [TenderController::class, 'award'])->name('tender.award.index');
Route::get('tender/{tender}/offerer', [TenderController::class, 'offerer'])->name('tender.offerer.index');
Route::get('tender-offerer/{tender}', [TenderOffererController::class, 'index']);
Route::get('award/{award}/contract', [AwardController::class, 'contract'])->name('award.contract.index');
Route::get('contract/{contract}/ammendment', [ContractController::class, 'ammendment'])->name('contract.ammendment.index');

Route::middleware(['auth'])->group(function () {
    Route::put('user/{user}', [UsersController::class, 'update'])->name('user.update');
    Route::resource('dashboard', DashboardController::class);

    // catalog
    Route::resource('catalog/organization', OrganizationController::class);
    Route::resource('catalog/organization_unit', OrganizationUnitController::class);
    Route::resource('catalog/official', OfficialController::class);
    Route::resource('catalog/role', RoleController::class);
    Route::resource('catalog/sector', SectorController::class);
    Route::resource('catalog/subsector', SubsectorController::class);
    Route::resource('catalog/source', SourceController::class);
    Route::resource('catalog/purpose', PurposeController::class);
    Route::post('catalog/purpose/api-web/store', [PurposeController::class, 'addFormApi'])->name('catalog.purpose.api-web.store');
    Route::resource('catalog/contract_type', ContractTypeController::class);
    Route::resource('catalog/offerer', OffererController::class);
    Route::resource('catalog/tender_method', TenderMethodController::class);
    Route::resource('catalog/contract_method', ContractMethodController::class);
    Route::resource('catalog/warranty-type', WarrantyTypeController::class);
    Route::resource('catalog/status', StatusController::class);
    Route::resource('catalog/tender-status', TenderStatusController::class);

    Route::get('subsector/ajax_get_subsector', [SubsectorController::class, 'ajax_get_subsector']);
    Route::resource('currency', CurrencyController::class);
    Route::resource('catalog/contact', ContactController::class);

    Route::post('project-file', [ProjectController::class, 'store_file']);
    Route::delete('project/file/destroy/{projectdocument}', [ProjectController::class, 'project_file_delete']);

    Route::get('project/{project}/tender/create', [TenderController::class, 'create_tender'])->name('project.tender.create');

    Route::get('award/{award}/contract/create', [AwardController::class, 'contractCreate'])->name('award.contract.create');

    Route::get('tender/{tender}/award/create', [TenderController::class, 'awardCreate'])->name('tender.award.create');
    Route::get('tender/{tender}/offerer/create', [TenderController::class, 'offererCreate'])->name('tender.offerer.create');

    // contract
    Route::get('contract/{contract}/ammendment/create', [ContractController::class, 'ammendmentCreate'])->name('contract.ammendment.create');

    Route::get('contract/{contract}/execution', [ContractController::class, 'execution'])->name('contract.execution.index');
    Route::get('contract/{contract}/execution/create', [ContractController::class, 'executionCreate'])->name('contract.execution.create');

    Route::get('contract/{contract}/completion', [ContractController::class, 'completion'])->name('contract.completion.index');
    Route::get('contract/{contract}/completion/create', [ContractController::class, 'completionCreate'])->name('contract.completion.create');

    Route::resource('contract', ContractController::class);

    //budget
    Route::get('project-budget/{project}/create', [BudgetController::class, 'create']);
    Route::get('project-budget/{budget}/edit', [BudgetController::class, 'edit']);
    Route::patch('project-budget/{budget}/update', [BudgetController::class, 'update']);
    Route::get('project-budget/{budget}/delete', [BudgetController::class, 'destroy']);
    Route::post('project-budget', [BudgetController::class, 'store']);
    Route::get('budget-source/{project_source}/delete', [BudgetController::class, 'destroy_source']);
    Route::post('budget-source', [BudgetController::class, 'store_project_source']);

    Route::get('get-unit/{entity}', [OrganizationUnitController::class, 'get_unit']);
    Route::get('get-official/{unit}', [OfficialController::class, 'get_official']);
    Route::get('get-subsector/{sector}', [SubsectorController::class, 'get_subsector']);

    Route::get('catalog/subsector/{sectorID}', [CatalogController::class, 'get_subsector']);
    Route::get('catalog/unit/{organizationID}', [CatalogController::class, 'get_units']);

    Route::get('transparency/{organization?}/citizens', [TransparencyController::class, 'citizens'])->name('transparency.citizens');
    Route::get('transparency/map', [TransparencyController::class, 'map'])->name('transparency.map');
    Route::get('transparency/faq', [TransparencyController::class, 'faq'])->name('transparency.faq');
    Route::post('transparency/project_states', [TransparencyController::class, 'project_states'])->name('transparency.project_states');
    Route::get('transparency/project/{project_code}', [TransparencyController::class, 'project'])->name('transparency.project');
    Route::get('transparency/project_managment/{project}/{track_engage}', [TransparencyController::class, 'project_managment'])->name('transparency.project_managment');
    Route::post('transparency/search_results', [TransparencyController::class, 'search_results'])->name('transparency.results');

    Route::get('temporal/transparency/project/{project_code}', [TemporalController::class, 'project'])->name('temporal.project');
    Route::get('temporal/transparency/project_managment/{project}', [TemporalController::class, 'project_managment'])->name('temporal.project_managment');

    Route::get('reports/adquisitions', [ReportsController::class, 'adquisitions'])->name('reports.adquisitions');
    Route::get('reports/technicians', [ReportsController::class, 'technicians'])->name('reports.technicians');
    Route::get('reports/suppliers', [ReportsController::class, 'suppliers'])->name('reports.suppliers');
    Route::get('reports/managment', [ReportsController::class, 'managment'])->name('reports.managment');
    Route::get('reports/download', [ReportsController::class, 'download'])->name('reports.download');

    //tender
    Route::resource('tender', TenderController::class);
    Route::get('project-tender/{project}', [TenderController::class, 'index_tender']);
    Route::get('tender-create/{project}', [TenderController::class, 'create_tender']);

    Route::post('tender-offerer', [TenderOffererController::class, 'store']);
    Route::get('tender-offerer/{tender}/delete', [TenderOffererController::class, 'destroy']);
    Route::get('get-supplier/{award}', [TenderOffererController::class, 'get_sup']);

    Route::resource('award', AwardController::class);
    Route::get('tender-award/{tender}', [AwardController::class, 'award']);
    Route::get('award-create/{tender}', [AwardController::class, 'create_award']);

    Route::get('contract-create/{award}', [ContractController::class, 'create_contract']);

    //completions
    Route::get('contract-completion/{completion}', [ContractController::class, 'completion']);
    Route::get('contract-completion/{contract}/create', [ContractController::class, 'completion_create']);
    Route::get('contract-completion/{completion}/edit', [ContractController::class, 'completion_edit']);
    Route::patch('contract-completion/{completion}/update', [ContractController::class, 'completion_update']);
    Route::post('contract-completion', [ContractController::class, 'completion_store']);
    Route::get('contract-completion/{completion}/delete', [ContractController::class, 'completion_destroy']);

    //contract-management
    Route::resource('ammendment', AmmendmentController::class);
    Route::get('contract-ammendment/{contract}', [AmmendmentController::class, 'ammendment']);
    Route::get('contract-ammendment/{contract}/create', [AmmendmentController::class, 'create_ammendment']);

    //execution
    Route::resource('execution', ExecutionController::class);
    Route::get('contract-execution/{execution}', [ExecutionController::class, 'execution']);
    Route::get('contract-execution/{contract}/create', [ExecutionController::class, 'create_execution']);

    //disbursment
    Route::get('disbursment/{execution}/create', [ExecutionController::class, 'disbursment']);
    Route::get('disbursment/{disbursment}/edit', [ExecutionController::class, 'disbursment_edit']);
    Route::patch('disbursment/{disbursment}/update', [ExecutionController::class, 'disbursment_update']);
    Route::post('disbursment', [ExecutionController::class, 'disbursment_store']);
    Route::get('disbursment/{disbursment}/delete', [ExecutionController::class, 'disbursment_destroy']);

    //warranty
    Route::get('warranty/{execution}', [ExecutionController::class, 'warranty']);
    Route::get('warranty/{execution}/create', [ExecutionController::class, 'create_warranty']);
    Route::get('warranty/{warranty}/edit', [ExecutionController::class, 'edit_warranty']);
    Route::patch('warranty/{warranty}/update', [ExecutionController::class, 'update_warranty']);
    Route::get('warranty/{warranty}/delete', [ExecutionController::class, 'destroy_warranty']);
    Route::post('warranty', [ExecutionController::class, 'warranty_store']);

    Route::resource('progress', ProgressController::class);
    Route::get('project-progress/{project}', [ProgressController::class, 'progress']);
    Route::get('project-progress/{project}/create', [ProgressController::class, 'create_progress']);
    Route::get('project-progress/{progress}/delete', [ProgressController::class, 'destroy']);
    Route::post('project-progress', [ProgressController::class, 'store']);

    Route::get('advance-images/{advance}', [ProgressController::class, 'images']);
    Route::post('advance-images/{advance}', [ProgressController::class, 'images_store']);
    Route::get('advance-image/{advance_image}/delete', [ProgressController::class, 'image_destroy']);

    //get-typeahed
    Route::get('get-contract-type', [ContractTypeController::class, 'get_data']);
    Route::get('get-contract-method', [ContractMethodController::class, 'get_data']);
    Route::get('get-tender-method', [TenderMethodController::class, 'get_data']);
    Route::get('get-tender-status', [TenderStatusController::class, 'get_data']);
    Route::get('get-status', [StatusController::class, 'get_data']);
    Route::get('get-role', [RoleController::class, 'get_data']);
    Route::get('get-warranty-type', [WarrantyTypeController::class, 'get_data']);
    Route::get('get-sources', [SourceController::class, 'get_data']);

    Route::post('agency/{agency}/user', [AgencyController::class, 'user'])->name('agency.user');
    Route::resource('agency', AgencyController::class);
    Route::resource('banner', BannerController::class);
});

Route::get('/oc4ids/export/csv', [FrontController::class, 'exportCsv'])->name('oc4ids.export.csv');
