<?php

require_once __DIR__ . '/../common/db.php';
require_once __DIR__ . '/../common/memcache.php';
require_once __DIR__ . '/../view/add.php';
require_once __DIR__ . '/../model/entity.php';

if (empty($_POST['data'])) {
    addEntityForm();
} else {
    if (addEntity(getDb(), getCache(), $_POST['data'])) {
        header('Location: /www/add.php');
    } else {
        echo "An error occured while adding item to the database";
    }
}
