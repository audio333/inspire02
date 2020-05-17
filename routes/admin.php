<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// List
Route::get('/posts', 'ApiController@posts');

Route::apiResource('users', 'AdminApi\UserController');
Route::apiResource('roles', 'AdminApi\RoleController');
Route::apiResource('permissions', 'AdminApi\PermissionController');
Route::get('activities/{userId?}', 'AdminApi\ActivityController@index');
