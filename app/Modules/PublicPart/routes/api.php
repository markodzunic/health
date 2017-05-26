<?php

Route::group(array('module' => 'PublicPart', 'middleware' => ['api'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('PublicPart', 'PublicPartController');
    
});	
