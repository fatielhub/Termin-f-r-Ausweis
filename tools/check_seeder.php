<?php
require __DIR__ . '/../vendor/autoload.php';
var_dump(class_exists('Database\\Seeders\\CentreCreneauSeeder'));
$map = require __DIR__ . '/../vendor/composer/autoload_classmap.php';
foreach ($map as $k => $v) {
    if (str_contains($k, 'CentreCreneauSeeder')) {
        echo "$k => $v\n";
    }
}
