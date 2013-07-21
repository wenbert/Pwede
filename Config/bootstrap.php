<?php
    Cache::config('short', array(
        'engine' => 'File',
        'duration' => '+1 hours',
        'path' => CACHE,
        'prefix' => 'pwede_short_'
    ));

    // long
    Cache::config('long', array(
        'engine' => 'File',
        'duration' => '+1 week',
        'probability' => 100,
        'path' => CACHE . 'long' . DS,
        'prefix' => 'pwede_long_'
    ));


    Configure::write('Pwede.RESULTS_PER_PAGE', 10);