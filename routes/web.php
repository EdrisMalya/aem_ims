<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect()->to(\route('public.index', ['lang' => 'eng']));
});

Route::get('test/{name}', function ($name){
    event(new \App\Events\TestEvent('This is for testing'));
    return $name;
});

Route::group(['prefix'=>'{lang}'], function(){
    Route::match(['POST','GET'], 'change/password', [\App\Http\Controllers\UserManagement\UserController::class, 'change_password'])->name('change.password')->middleware(['auth']);

    Route::middleware('lang')->group(function(){

        /***************************** After login routes ************************/
        Route::middleware(['auth', 'check_user' ])->group(function (){
            Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
            Route::get('fire/test/event', [\App\Http\Controllers\DashboardController::class, 'testEvent'])->name('first.test.event');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::get('/test', [\App\Http\Controllers\TestController::class, 'test'])->name('test');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


            /***************************** Customer Routes ****************************/
            Route::resource('customer', \App\Http\Controllers\Configurations\StoreSettings\CustomerController::class);

            /************************** This code should never be deleted ****************************/
            /**** Other routes ****/

            /*********************************** Products Routes ****************************/
            Route::prefix('products-management')->group(function (){
                Route::get('/', function(){
                    User::isAllowed('products-management-access');
                    return Inertia::render('ProductManagement/ProductManagementIndex');
                })->name('products-management.index');
                Route::resource('product', \App\Http\Controllers\ProductManagement\ProductController::class);
            });
            /*************************************** User management routes ****************************************/
            Route::group(['prefix' => 'user/management'], function (){
                Route::get('/', function(){
                    User::isAllowed('user-management-access');
                    return Inertia::render('UserManagement/UserManagementIndex');
                })->name('user-management.index');

                /********************************** Users routes ********************************/
                Route::resource('users', \App\Http\Controllers\UserManagement\UserController::class);

                /*************************************** Role routes *****************************************/
                Route::resource('role', \App\Http\Controllers\UserManagement\RoleController::class);
                Route::match(['POST', 'PUT', 'DELETE'],'save/role/group', [\App\Http\Controllers\UserManagement\RoleController::class, 'saveRoleGroup'])->name('role.group.save');

                /****************************************** Login log ***************************************/
                Route::resource('login_log', \App\Http\Controllers\UserManagement\LoginLogController::class);

                /******************************************* Log activities ************************************/
                Route::get('log/activities', [\App\Http\Controllers\UserManagement\LogActivityController::class, 'index'])->name('log.activities.index');
                Route::delete('delete/log/activity/{activity}', [\App\Http\Controllers\UserManagement\LogActivityController::class, 'deleteLogActivity'])->name('destroy.activity');

                /*************************************** Permission routes ************************************/
                Route::resource('permissions', \App\Http\Controllers\UserManagement\PermissionsController::class);
                Route::post('save/permission', [\App\Http\Controllers\UserManagement\PermissionsController::class, 'savePermission'])->name('save-permission');
                Route::post('update/permission/sort', [\App\Http\Controllers\UserManagement\PermissionsController::class, 'updatePermissionSort'])->name('update.permission.sort');
                Route::delete('delete/permission/{permission}', [\App\Http\Controllers\UserManagement\PermissionsController::class, 'deletePermission'])->name('delete-permission');

                /******************************************* Helper routes **********************************/
                Route::post('download/pdf', [\App\Http\Controllers\HelperController::class, 'downloadPdf'])->name('download.pdf');
            });

            /**************************************** Configuration routes ***********************************************/
            Route::group(['prefix'=>'configuration'], function(){
                Route::get('/', function(){
                    User::isAllowed('configuration-access');
                    return Inertia::render('Configuration/ConfigurationIndex');
                })->name('configuration.index');

                /************************************* Language routes ********************************************/
                Route::resource('language', \App\Http\Controllers\Configurations\LanguageController::class);
                Route::get('get/language/words', [\App\Http\Controllers\Configurations\LanguageController::class, 'returnAllWords']);
                Route::resource('language/dictionary', \App\Http\Controllers\Configurations\LanguageDictionaryController::class);

                /******************************* Store setting routes ********************************/
                Route::prefix('store-settings')->group(function(){
                    Route::resource('system-settings', \App\Http\Controllers\Configurations\StoreSettings\SystemSettingsController::class);

                    /***************************** Currency Routes ****************************/
                    Route::resource('currency', \App\Http\Controllers\Configurations\StoreSettings\CurrencyController::class);

                    /***************************** Warehouse Routes ****************************/
                    Route::resource('warehouse', \App\Http\Controllers\Configurations\StoreSettings\WarehouseController::class);
                });

                /************************************ Public website routes ********************************************/
                Route::prefix('public')->group(function(){
                    Route::resource('/website', \App\Http\Controllers\PublicWebsite\PublicWebsiteController::class);

                    /************************ Widgets title ********************************/
                    Route::prefix('website')->group(function(){
                        Route::resource('/widgets', \App\Http\Controllers\PublicWebsite\WidgetsController::class);
                    });
                });

                /**************************************** backup routes ********************************************/
                Route::get('backup', [\App\Http\Controllers\Configurations\BackupController::class, 'index'])->name('backup.index');
            });
        });

        /******************************* Public Routes ***************************/
        Route::middleware(['public_website'])->group(function(){
            Route::get('/', [\App\Http\Controllers\PublicWebsite\PublicWebsiteController::class, 'homePage'])->name('public.index');
        });
    });
;



});



require __DIR__.'/auth.php';
