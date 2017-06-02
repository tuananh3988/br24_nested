<?php

require_once './models/BaseModel.php';
require_once './models/TreeNested.php';
require_once './common/Utility.php';
$config = require_once './config.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$treeNested = new TreeNested($config);
$isError = false;
//check isset id in database
if (!empty($id)) {
    $folderArr = $treeNested->findOne($id);
    if (empty($folderArr)) {
        $isError = true;
    }
}
//delete action
if ($action == 'delete' && !$isError) {
    $treeNested->delete($folderArr);
    header("Location: /");
}
//restore action
if ($action == 'restore') {
    $treeNested->restore();
    header("Location: /");
}
//add new action
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' && !$isError) {
    if (!empty($_POST['btl_add'])) {
        $treeNested->add($folderArr, $_POST['folder_name']);
        header("Location: /");
    }
    
    if (!empty($_POST['btl_cancel'])) {
        header("Location: /");
    }
    
}
//list folder
$data = $treeNested->getAll();
$tree = $treeNested->createTree($data);
$list = Utility::createList($tree, $data);
?>

<!DOCTYPE html>
<html>
<body>
<h1>Folder tree manage</h1>
<?php if ($isError): ?>
    <p>Folder Id not found </p>
<?php else: ?>
    <?= $list ?>
    <?php if ($action == 'create'): ?>
        <?php include_once './views/add.php'; ?>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>