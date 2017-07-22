<?php

$rows = [];
for ($i = 0; $i < 10000; $i++) {
    $rows []= 'http://localhost:8000/www/index.php?raw=true&page=' . $i;
}

file_put_contents('siege-urls.txt', implode(PHP_EOL, $rows));
