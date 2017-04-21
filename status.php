<?php

function get_data($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 1);
	$data = json_decode(curl_exec($ch), true);
	curl_close($ch);
	return $data;
}

$warning_delay = 60 * 10;
$cache_delay = 60;

$cache = json_decode(file_get_contents('cache.json'), true);

$data_count = array('size' => $cache['data.webifier.de']['size']);
if ($cache['data.webifier.de']['time'] + $cache_delay <= time()) {
	$data_count = get_data('https://data.webifier.de/count');
}
$data_webifier = array();
if (isset($data_count) && !empty($data_count)) {
	$data_webifier['status'] = 'success';
	if ($cache['data.webifier.de']['size'] == $data_count['size']) {
		if ($cache['data.webifier.de']['time'] + $warning_delay <= time()) {
			$data_webifier['status'] = 'warning';
		}
	} else {
		$cache['data.webifier.de']['time'] = time();
		$cache['data.webifier.de']['size'] = $data_count['size'];
	}
	$data_webifier['entries'] = $data_count['size'];
} else {
	$cache['data.webifier.de']['size'] = '-1';
	$data_webifier['status'] = 'error';
}

$webifier_queue = array('size' => $cache['www.webifier.de']['size']);
if ($cache['www.webifier.de']['time'] + $cache_delay <= time()) {
	$webifier_queue = get_data('https://www.webifier.de/queue');
}
$platform_webifier = array();
if (isset($webifier_queue) && !empty($webifier_queue)) {
	$platform_webifier['status'] = 'success';
	if ($cache['www.webifier.de']['size'] == $webifier_queue['size']) {
		if ($cache['www.webifier.de']['time'] + $warning_delay <= time()) {
			$platform_webifier['status'] = 'warning';
		}
	} else {
		$cache['www.webifier.de']['time'] = time();
		$cache['www.webifier.de']['size'] = $webifier_queue['size'];
	}
	$platform_webifier['entries'] = $webifier_queue['size'];
} else {
	$cache['www.webifier.de']['size'] = '-1';
	$platform_webifier['status'] = 'error';
}

$power_queue = array('size' => $cache['power.webifier.de']['size']);
if ($cache['power.webifier.de']['time'] + $cache_delay <= time()) {
	$power_queue = get_data('https://power.webifier.de/queue');
}
$power_webifier = array();
if (isset($power_queue) && !empty($power_queue)) {
	$power_webifier['status'] = 'success';
	if ($cache['power.webifier.de']['size'] == $power_queue['size']) {
		if ($cache['power.webifier.de']['time'] + $warning_delay <= time()) {
			$power_webifier['status'] = 'warning';
		}
	} else {
		$cache['power.webifier.de']['time'] = time();
		$cache['power.webifier.de']['size'] = $power_queue['size'];
	}
	$power_webifier['entries'] = $power_queue['size'];
} else {
	$cache['power.webifier.de']['size'] = '-1';
	$power_webifier['status'] = 'error';
}

file_put_contents('cache.json', json_encode($cache), FILE_TEXT);

header('Content-Type: application/json;charset=UTF-8');
header('Cache-Control: no-cache');

echo json_encode(array('data.webifier.de' => $data_webifier, 'www.webifier.de' => $platform_webifier, 'power.webifier.de' => $power_webifier));