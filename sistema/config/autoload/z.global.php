<?php

// ====================================================================================================================
// É inserido (por último) em todos os ambientes (desenvolvimento, staging, produção, etc.).
// ====================================================================================================================

if (USE_CDN) {
    // define('APPLICATION_ASSETS', '//...');
    define('BOOTSTRAP_ASSETS', '//netdna.bootstrapcdn.com/bootstrap/3.0.3');
    define('JQUERY_ASSETS', '//code.jquery.com');
} else {
    define('APPLICATION_ASSETS', WWWROOT . '/assets/application');
    define('BOOTSTRAP_ASSETS', WWWROOT . '/assets/bootstrap');
    define('JQUERY_ASSETS', WWWROOT . '/assets/jquery');
}

return array();
