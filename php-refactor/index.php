<?php
define('URL_ROOT', 'localhost:3000');

	$data = [
		'pageTitle' => 'Home',
		'articles' =>[
			[
				'title' => "Check Out These Dolphins",
				'img' => [
					'src' =>'dolphin.jpg',
					'alt' => 'dolphin',
				],
				'author' => 'Justin Cox',
				'date' => 'January 21, 2024',
				'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum hic optio culpa, atque possimus suscipit maxime similique quam laudantium saepe distinctio veniam doloremque libero nostrum labore fuga quos, ullam delectus.',
				'link' =>'/articles/dolphins.php',
			],
			[
				'title' => "All About Jaguars",
				'img' =>[
					'src' => 'jaguar.webp',
					'alt' => 'jaguar',
				], 
				'author' => 'Justin Cox',
				'date' => 'January 19, 2024',
				'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum hic optio culpa, atque possimus suscipit maxime similique quam laudantium saepe distinctio veniam doloremque libero nostrum labore fuga quos, ullam delectus.',
				'link' =>'/articles/jaguars.php',
			]
		]

	];

include_once('src/views/head.view.php');
?>
<main>
	<?php foreach($data['articles'] as $article){ ?>
		<article>
			<img src="<?php echo $article['img']['src']?>" alt="<?php echo $article['img']['alt']?>">
			<div>
				<h2 class="article-tite"><?php echo $article['title']?></h2>
				<div class="article-meta">
					<p class="article-aurthor"><?php echo $article['author']?></p>
					<p class="article-date"><?php echo $article['date']?></p>
				</div>
				<p class="article-content">
					<?php echo $article['content']?>				
				</p>
				<a href="<?php echo $article['link']?>">Read More</a>
			</div>
		</article>
	<?php } ?>
</main>
<?php include_once('src/views/footer.view.php') ?>