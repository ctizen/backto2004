<?php

require_once __DIR__ . '/../common/db.php';
require_once __DIR__ . '/../model/entity.php';
require __DIR__ . '/../view/index.php';

$db = getDb();
$e = getEntitiesList($db, 'id', 100, 0);
echo renderEntitiesList($e);
