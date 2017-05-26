<?php

Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('AdminPart', 'AdminPartController');
    
});	
