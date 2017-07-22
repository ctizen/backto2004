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
$content
<script src="assets/main.js"></script>
</body>
</html>
BODY;
}