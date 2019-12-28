<?php

$routes->group('', ['namespace' => 'News\Controllers'], function ($routes) {
	$routes->match(['get', 'post'], 'news/create', 'News::create');
	$routes->get('news/(:segment)', 'News::view/$1');
	$routes->get('news', 'News::index');
});
