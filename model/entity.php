<?php

function makeEntitiesListCacheKey($order, $limit, $offset) {
    return 'entities_' . $order . '_' . $limit . '_' . $offset;
}

function getEntitiesList($db, $cache, $orderBy = 'id', $limit = 100, $offset = 0) {
    // naive validation
    $orderBy = $orderBy === 'id' ? 'id' : 'cost';
    $limit = intval($limit);
    $offset = intval($offset);
    $cacheKey = makeEntitiesListCacheKey($orderBy, $limit, $offset);

    if ($cachedResult = memcache_get($cache, $cacheKey)) {
        return @unserialize($cachedResult);
    }

    $query = "SELECT * FROM `entity` ORDER BY $orderBy LIMIT $offset,$limit";
    $res = mysql_query($query, $db);
    $data = array();
    while($row = mysql_fetch_assoc($res)) {
        $data []= $row;
    }

    // Randomize expiration time for better uniformity
    memcache_add($cache, $cacheKey, serialize($data), null, mt_rand(10, 50));
    return $data;
}

function addEntity($db, $cache, $data) {
    $query = sprintf(
        "INSERT INTO `entity` (`title`, `description`, `cost`, `img`) VALUES ('%s', '%s', %.2f, '%s')",
        mysql_real_escape_string($data['title'], $db),
        mysql_real_escape_string($data['description'], $db),
        floatval($data['cost']),
        mysql_real_escape_string($data['img'], $db)
    );

    return mysql_query($query, $db);
}

function dbg__fillWithTestData($db, $count) {
    $rows = array();

    for ($i = 0; $i < $count; $i++) {
        $title = 'title ' . md5(microtime());
        $description = 'This is description of ' . $title . ' ' . $title . ' ' . $title;
        $url = 'http://images.com/goods/' . md5(microtime());
        $cost = mt_rand(0, 100000000) / 100.;

        $rows []= "('$title', '$description', $cost, '$url')";

        if (count($rows) >= 1000) {
            $query = "INSERT INTO `entity` (`title`, `description`, `cost`, `img`) VALUES " . implode(',', $rows);
            mysql_query($query, $db);
            $rows = array();
        }
    }
}

function dbg__clearDb($db) {
    return mysql_query("TRUNCATE TABLE `entity`", $db);
}
