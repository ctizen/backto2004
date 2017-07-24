<?php

function commonTemplate($content)
{
    return <<<BODY
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Where is my 2004?</title>
  <base href="/">
  <link href="assets/main.css" rel="stylesheet"/>
</head>
<body>
<div>
    <a href="/index.php">Sort by id</a>
    <a href="/index.php?sort=cost">Sort by cost</a>
    <a href="/add.php" target="_blank">Add new</a>
</div>
$content
<script src="assets/main.js"></script>
</body>
</html>
BODY;
}