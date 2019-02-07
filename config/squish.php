<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Path Settings
    |--------------------------------------------------------------------------
    |
    | These settings will determine the url path that you access your
    | application through. You can choose to combine subdomain and/or
    | directory path for the location of your administration area.
    |
    | Do NOT add a starting slash to the path name. For domain root path,
    | simply leave path attribute as an empty string
    |
    */

    'path' => env('APP_PATH', ''),
    'domain' => env('APP_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => realpath(storage_path('framework/views')),

];
