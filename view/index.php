<?php
require_once __DIR__ . '/commonTemplate.php';

// Entities list

function renderEntitiesList($entities) {
    $items = array();
    foreach ($entities as $entity) {
        $items []=
          "<tr>" . PHP_EOL
        . "  <td>${entity['id']}</td>" . PHP_EOL
        . "  <td>${entity['title']}</td>" . PHP_EOL
        . "  <td>${entity['cost']}</td>" . PHP_EOL
        . "  <td>${entity['description']}</td>" . PHP_EOL
        . "  <td>${entity['img']}</td>" . PHP_EOL
        . "</tr>" . PHP_EOL;
    }

    return commonTemplate(
        "<h2>Goods list</h2>" . PHP_EOL
        ."<table class='goodslist'><tbody>" . PHP_EOL
        . "<tr><th>#</th><th>Title</th><th>Cost</th><th>Description</th><th>Photo</th></tr>" . PHP_EOL
        . implode('', $items) . PHP_EOL
        . '</tbody></table>'
    );
}