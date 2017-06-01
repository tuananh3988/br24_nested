<?php
require_once './models/BaseModel.php';
require_once './models/TreeNested.php';
$config = require_once './config.php';

$tree = new TreeNested($config['db']);

var_dump($tree->getAll());die;

