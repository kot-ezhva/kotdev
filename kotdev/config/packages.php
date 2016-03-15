<?php
$packages['bootstrap'] = [
    'basePath' => 'application.assets.bootstrap.js',
    'js' => ['bootstrap.min.js'],
    'depends' => ['jquery', 'bootstrap.css'],
];
$packages['jquery'] = [
    'basePath' => 'application.assets.jquery.js',
    'js' => ['jquery.min.js'],
];
$packages['bootstrap.css'] = [
    'basePath' => 'application.assets.bootstrap.css',
    'css' => ['bootstrap.min.css'],
];
$packages['admin.css'] = [
    'basePath' => 'application.assets.admin.css',
    'css' => ['style.css'],
];
$packages['bootstrap.material'] = [
    'basePath' => 'application.assets.bootstrap_material.css',
    'css' => ['bootstrap-material-design.min.css', 'ripples.min.css'],
    'depends' => ['bootstrap', 'material.js'],
];
$packages['material.js'] = [
    'basePath' => 'application.assets.bootstrap_material.js',
    'js' => ['material.min.js', 'ripples.min.js'],
];

return $packages;

