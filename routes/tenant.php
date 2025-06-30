<?php

declare(strict_types=1);

use App\Http\Controllers\Central\Tenant\TenantController;
use App\Http\Controllers\Central\User\UserController;
use App\Http\Controllers\Tenant\Accountants\AccountController;
use App\Http\Controllers\Tenant\Accountants\JournalController;
use App\Http\Controllers\Tenant\Accountants\TaxRateController;
use App\Http\Controllers\Tenant\BankAccounts\BankAccountController;
use App\Http\Controllers\Tenant\Branches\BranchController;
use App\Http\Controllers\Tenant\CostCenter\CostCenterController;
use App\Http\Controllers\Tenant\Customers\ContactController;
use App\Http\Controllers\Tenant\FixedAssets\FixedAssetController;
use App\Http\Controllers\Tenant\Products\InventoryAdjustmentController;
use App\Http\Controllers\Tenant\Products\ProductController;
use App\Http\Controllers\Tenant\Products\WarehouseController;
use App\Http\Controllers\Tenant\Projects\ProjectController;
use App\Http\Middleware\InitializeTenantFromSession;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware(['web', 'auth', InitializeTenantFromSession::class])->group(function () {
    // Organization
    Route::apiResource('organizations', TenantController::class);
    Route::post('organizations/logo', [TenantController::class, 'update_logo']);
    Route::get('user-organizations', [UserController::class, 'user_organizations']);

    // Accounting
    Route::apiResource('chart-of-accounts', AccountController::class);
    Route::apiResource('tax-rates', TaxRateController::class);
    Route::apiResource('branches', BranchController::class);
    Route::apiResource('cost-centers', CostCenterController::class);
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('fixed-assets', FixedAssetController::class);
    Route::apiResource('bank-accounts', BankAccountController::class);
    Route::apiResource('contacts', ContactController::class);
    Route::apiResource('journals', JournalController::class);

    // Inventory Management
    Route::apiResource('products', ProductController::class);
    Route::apiResource('adjustments', InventoryAdjustmentController::class);
    Route::apiResource('warehouses', WarehouseController::class);

    // Human Resources

    // Logout
    Route::post('logout', [UserController::class, 'logout']);
});
