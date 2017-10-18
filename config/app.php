<?php 

return [
	/*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => array('APP_DEBUG' => true),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => array('APP_URL' => 'http://localhost:3000/project10'),

    /*
    |--------------------------------------------------------------------------
    | Session config
    |--------------------------------------------------------------------------
    |
    | Start session for system and change storage save session.
    |
    */
    'session' => array( 'status' => true, 'storage' => ''),
];