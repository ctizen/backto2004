<?php

function getEntitiesList($db, $orderBy = 'id', $limit = 100, $offset = 0) {
    // naive validation
    $orderBy = $orderBy === 'id' ? 'id' : 'cost';
    $limit = intval($limit);
    $offset = intval($offset);

    $query = "SELECT * FROM `entity` ORDER BY $orderBy LIMIT $limit,$offset";
    $res = mysql_query($query, $db);
    $data = array();
    while($row = mysql_fetch_assoc($res)) {
        $data []= $row;
    }

    return $data;
}

function dbg__fillWithTestData($db, $count) {
    $rows = array();

    for ($i = 0; $i < $count; $i++) {
        $title = 'title ' . md5(microtime());
        $description = 'This is description of ' . $title . ' ' . $title . ' ' . $title;
        $url = 'http://images.com/goods/' . md5(microtime());
        $cost = mt_rand(0, 100000000) / 100.;

        $rows []= "('$title', '$description', $cost, '$url')";
    }

    $query = "INSERT INTO `entity` (`title`, `description`, `cost`, `img`) VALUES " . implode(',', $rows);
    return mysql_query($query, $db);
}

function dbg__clearDb($db) {
    return mysql_query("TRUNCATE TABLE `entity`", $db);
}