<?php
require_once __DIR__ . '/commonTemplate.php';

// Entities list

function renderEntitiesList($entities, $sort, $raw = false) {
    $items = array();
    foreach ($entities as $entity) {
        $items []=
          "<tr>" . PHP_EOL
        . "  <td>${entity['id']}</td>" . PHP_EOL
        . "  <td>${entity['title']}</td>" . PHP_EOL
        . "  <td>${entity['cost']}</td>" . PHP_EOL
        . "  <td class='description'>${entity['description']}</td>" . PHP_EOL
        . "  <td>${entity['img']}</td>" . PHP_EOL
        . "  <td>
            <a target='_blank' href='/www/update.php?id=${entity['id']}'>Edit</a> /
            <a target='_blank' href='/www/delete.php?id=${entity['id']}'>Delete</a>
            </td>"
        . "</tr>" . PHP_EOL;
    }

    $items []= '<tr class="load_more"></tr>'; // marker for data insertion
    if ($raw) { // to load more data to existing page
        return '<html><body><table><tbody class="insertion_data">' . implode('', $items) . '</tbody></table></body></html>';
    }

    return commonTemplate(
        "<input type='hidden' id='sortOrder' value='$sort' />"
        . "<h2>Goods list</h2>" . PHP_EOL
        ."<table class='goodslist'><tbody>" . PHP_EOL
        . "<tr><th>#</th><th>Title</th><th>Cost</th><th>Description</th><th>Photo</th><th>Operations</th></tr>" . PHP_EOL
        . implode('', $items) . PHP_EOL
        . '</tbody></table>'
    );
}