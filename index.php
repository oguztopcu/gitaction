<?php

require 'vendor/autoload.php';

use \GuzzleHttp\Client;

try {
	$request = new Client();

	$response = $request->request(
		'GET', 
		'https://jsonplaceholder.typicode.com/posts'
	);

	if ($response->getStatusCode() != 200) {
		throw new \RuntimeErrorException('Try to jsonplaceholder not respond');
	}

	echo '<h1>Hello, GitActions!</h1>';
	echo '<h2>Deploy to server test</h2>';

	echo '<ul>';
	foreach (json_decode($response->getBody()->getContents()) as $item) {
		echo "<li><a href=\"{$item->id}\">{$item->title}</a></li>";
	}
	echo '</ul>';
} catch (\Exception $exception) {
	echo $exception->getMessage();
}
