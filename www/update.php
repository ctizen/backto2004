<?php

require_once __DIR__ . '/../common/db.php';
require_once __DIR__ . '/../common/memcache.php';
require_once __DIR__ . '/../view/update.php';
require_once __DIR__ . '/../model/entity.php';

$db = getDb();
$cache = getCache();

if (empty($_POST['data'])) {
    $id = intval($_GET['id']);
    $data = getEntityData($db, $id);
    if (empty($data)) {
        echo "No item found in DB";
    } else {
        echo editEntityForm($data);
    }
} else {
    if (updateEntity($db, $_POST['data'])) {
        header('Location: /www/update.php?id=' . $_POST['data']['id']);
    } else {
        echo "An error occured while updating item in the database";
    }
}
