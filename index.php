<?php

require_once './models/BaseModel.php';
require_once './models/TreeNested.php';
$config = require_once './config.php';

$treeNested = new TreeNested($config['db']);

$data = $treeNested->getAll();
$tree = $treeNested->createTree($data);

function createList($keys, $category) {
    $list = "<ul>";
    foreach ($keys as $key => $row) {
        if (count($row)) {
            $list .= '<li>' . $category[$key]['name'] . createList($row, $category) . '</li>';
        } else {
            $list .= '<li>' . $category[$key]['name'] . '</li>';
        }
    }

    $list .= "</ul>";
    if (strpos($list, '<li>') === false) {
        $list = '';
    }
    return $list;
}

$list = createList($tree, $data);

print $list;

