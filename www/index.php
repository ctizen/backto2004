<?php

require_once __DIR__ . '/../common/db.php';
require_once __DIR__ . '/../common/memcache.php';
require_once __DIR__ . '/../model/entity.php';
require __DIR__ . '/../view/index.php';

$db = getDb();
$cache = getCache();
$limit = 100;
$sort = empty($_GET['sort']) || $_GET['sort'] === 'id' ? 'id' : 'cost';
$offset = (empty($_GET['page']) ? 0 : intval($_GET['page']) - 1) * $limit;

//dbg__fillWithTestData($db, 1000000);

$e = getEntitiesList($db, $cache, $sort, $limit, $offset);
echo renderEntitiesList($e, $sort, !empty($_GET['raw']));
