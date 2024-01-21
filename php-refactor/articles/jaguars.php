<?php
define('URL_ROOT', 'http://localhost:3000');
define('APP_ROOT', dirname(__DIR__));
	$data = [
		'pageTitle' => 'Jaguars',
		'title' => "All About Jaguars",
		'img' => [
			'src' =>'jaguar.webp',
			'alt' => 'jaguar',
		],
		'author' => 'Justin Cox',
		'date' => 'January 19, 2024',
		'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum hic optio culpa, atque possimus suscipit maxime similique quam laudantium saepe distinctio veniam doloremque libero nostrum labore fuga quos, ullam delectus.',

	];

	include_once(APP_ROOT . '/src/views/head.view.php');
	include_once(APP_ROOT . '/src/views/article.view.php');
	include_once(APP_ROOT . '/src/views/footer.view.php');
?>