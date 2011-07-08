<?php

function err($msg) {
	header("HTTP/1.0 400 Bad Request");
	header("Content-type: text/plain");
	echo $msg;
	exit;
}
if (!isset($_POST['xml'])) {
	err("You must send POST data (field: xml)");
}
$xml = @simplexml_load_string($_POST['xml']);
if (!$xml) {
	err("Could not parse XML");
}

header("HTTP/1.0 202 Accepted");
header("Content-type: application/json");
echo json_encode(iterator_to_array($xml));
