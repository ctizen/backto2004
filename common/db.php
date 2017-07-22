<?php

function getDb() {
    static $res = null;
    if (!$res) {
        $res = mysql_pconnect('localhost', 'root', '', MYSQL_CLIENT_COMPRESS);
        mysql_select_db('whereismy2004', $res);
    }

    return $res;
}