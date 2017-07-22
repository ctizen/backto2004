<?php

function getCache() {
    static $conn = null;
    if (!$conn) {
        $conn = memcache_connect('127.0.0.1', 11211);
    }

    return $conn;
}