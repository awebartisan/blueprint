<?php

require_once(app_path('helpers.php'));

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::post('projects/{project}/asset', 'ProjectsAssetUploadController@store')->name('projects.asset.upload');
Route::resource('projects', 'ProjectsController');
