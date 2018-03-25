<?php

// This configuration will be merged with web.php
// See index.php for detail on merging

$config = [];

if (IS_GAE || getenv('ASSET_GOOGLE_STORAGE_BUCKET')) {

    // Use Google Storage for assets
    $config['components']['assetManager'] = [
        'class' => 'Oitmain\Yii2\Google\GoogleStorageAssetManager',
        'googleStorageBucket' => getenv('ASSET_GOOGLE_STORAGE_BUCKET'),
        'baseUrl' => 'https://storage.googleapis.com/' . getenv('ASSET_GOOGLE_STORAGE_BUCKET'),
        'basePath' => sys_get_temp_dir(),
    ];

}

if (IS_GAE) {

    // Use tmp directory for runtime files
    $config['runtimePath'] = sys_get_temp_dir();

    $config['components']['db']['enableSchemaCache'] = true;
    $config['components']['db']['schemaCacheDuration'] = 0;
    $config['components']['db']['schemaCache'] = 'cache';

}


return $config;