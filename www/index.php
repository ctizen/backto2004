<?php

require_once __DIR__ . '/../common/db.php';
require_once __DIR__ . '/../common/memcache.php';
require_once __DIR__ . '/../model/entity.php';
require __DIR__ . '/../view/index.php';

$db = getDb();
$cache = getCache();
$limit = 100;
$offset = (empty($_GET['page']) ? 0 : intval($_GET['page']) - 1) * $limit;
$e = getEntitiesList($db, $cache, 'id', $limit, $offset);
echo renderEntitiesList($e, !empty($_GET['raw']));
