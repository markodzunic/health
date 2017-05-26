<?php

Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('PublicPart', 'PublicPartController');
    
});	
