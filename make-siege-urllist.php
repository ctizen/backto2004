<?php

$rows = [];
for ($i = 0; $i < 300; $i++) {
    $rows []= 'http://localhost:8000/index.php?raw=true&page=' . $i;
}

file_put_contents('siege-urls.txt', implode(PHP_EOL, $rows));
