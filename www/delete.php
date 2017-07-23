<?php

require_once __DIR__ . '/../common/db.php';
require_once __DIR__ . '/../common/memcache.php';
require_once __DIR__ . '/../model/entity.php';

$db = getDb();
$cache = getCache();

$id = intval($_GET['id']);
if (deleteEntity($db, $id)) {
    echo "Item deleted successfully";
} else {
    echo "An error occured while updating item in the database";
}
