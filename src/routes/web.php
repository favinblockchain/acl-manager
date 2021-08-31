<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Sinarajabpour1998\AclManager\Http\Controllers',
    'prefix' => 'panel',
    'middleware' => ['web', 'auth', 'verified']
], function () {
    Route::namespace('Authorization')->group(function () {

        Route::resource('permissions', 'PermissionsController')
            ->except(['show']);

        Route::resource('roles', 'RolesController')
            ->except(['show']);

        Route::resource('roles-assignment', 'RolesAssignmentController')
            ->only(['index', 'edit', 'update']);

    });
    Route::namespace('User')->group(function (){
        Route::resource('users', 'UserController')
            ->except(['index', 'show']);
        Route::get('/user/search/ajax', 'UserController@searchAjax')->name('user.search_ajax');
        Route::get('/users/reset/password/{user}', 'UserController@userResetPasswordForm')->name('user.reset_password');
        Route::post('/users/reset/password/{user}', 'UserController@userResetPassword'); //
    });
});
