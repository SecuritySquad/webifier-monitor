<?php
$opts = array(
	'http' => array(
		'method' => "GET",
		'header' => "Content-Type: application/json;charset=UTF-8"
	)
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('https://power.webifier.de/queue', false, $context);
echo $file;