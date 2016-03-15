<?php
$packages['bootstrap'] = [
    'basePath' => 'kotdev.assets.bootstrap.js',
    'js' => ['bootstrap.min.js'],
    'depends' => ['jquery', 'bootstrap.css'],
];
$packages['jquery'] = [
    'basePath' => 'kotdev.assets.jquery.js',
    'js' => ['jquery.min.js'],
];
$packages['bootstrap.css'] = [
    'basePath' => 'kotdev.assets.bootstrap.css',
    'css' => ['bootstrap.min.css'],
];
$packages['admin.css'] = [
    'basePath' => 'kotdev.assets.admin.css',
    'css' => ['style.css'],
];
$packages['bootstrap.material'] = [
    'basePath' => 'kotdev.assets.bootstrap_material.css',
    'css' => ['bootstrap-material-design.min.css', 'ripples.min.css'],
    'depends' => ['bootstrap', 'material.js'],
];
$packages['material.js'] = [
    'basePath' => 'kotdev.assets.bootstrap_material.js',
    'js' => ['material.min.js', 'ripples.min.js'],
];

return $packages;

