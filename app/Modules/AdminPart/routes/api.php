<?php

Route::group(array('module' => 'AdminPart', 'middleware' => ['api'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('AdminPart', 'AdminPartController');
    
});	
