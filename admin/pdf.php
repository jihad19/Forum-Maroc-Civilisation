<?php

require "function.php";

$url = $_GET['url'];
$path = $url;

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename='.basename($path));
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

readfile("{$_SERVER['DOCUMENT_ROOT']}/$path");