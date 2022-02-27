<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Favinblockchain\AclManager\Http\Controllers',
    'prefix' => 'panel',
    'middleware' => ['web', 'auth', 'verified', Config::get('acl-manager.permissions.main')]
], function () {
    Route::namespace('Authorization')->group(function () {

        Route::resource('permissions', 'PermissionsController')
            ->except(['show'])->middleware([Config::get('acl-manager.permissions.permissions')]);

        Route::resource('roles', 'RolesController')
            ->except(['show'])->middleware([Config::get('acl-manager.permissions.roles')]);

        Route::resource('roles-assignment', 'RolesAssignmentController')
            ->only(['index', 'edit', 'update'])->middleware([Config::get('acl-manager.permissions.users')]);

    });
    Route::namespace('User')->group(function (){
        Route::resource('users', 'UserController')
            ->except(['index', 'show']);
        Route::get('/users/reset/password/{user}', 'UserController@userResetPasswordForm')->name('user.reset_password');
        Route::post('/users/reset/password/{user}', 'UserController@userResetPassword'); //
    });
});
