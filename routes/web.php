<?php

declare(strict_types=1);

use TCG\Voyager\Events\Routing;
use TCG\Voyager\Events\RoutingAdmin;
use TCG\Voyager\Events\RoutingAdminAfter;
use TCG\Voyager\Events\RoutingAfter;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Voyager Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with Voyager.
|
*/

Route::group(['prefix' => config('joy-voyager-user-settings.admin_prefix', 'admin')], function () {
    Route::group(['as' => 'voyager.'], function () {

        $namespacePrefix = '\\' . config('joy-voyager-user-settings.controllers.namespace') . '\\';

        Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {

            $breadController = $namespacePrefix . 'VoyagerUserSettingsController';

            // Settings
            Route::group([
                'as'     => 'users.user-settings.',
                'prefix' => 'users/{id}/settings',
            ], function () use ($breadController) {
                Route::get('/', ['uses' => $breadController . '@index',        'as' => 'index']);
                Route::post('/', ['uses' => $breadController . '@store',        'as' => 'store']);
                Route::put('/', ['uses' => $breadController . '@update',       'as' => 'update']);
                Route::delete('{sid}', ['uses' => $breadController . '@delete',       'as' => 'delete']);
                Route::get('{sid}/move_up', ['uses' => $breadController . '@move_up',      'as' => 'move_up']);
                Route::get('{sid}/move_down', ['uses' => $breadController . '@move_down',    'as' => 'move_down']);
                Route::put('{sid}/delete_value', ['uses' => $breadController . '@delete_value', 'as' => 'delete_value']);
            });
        });
    });
});
