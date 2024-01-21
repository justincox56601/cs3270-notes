<main>
	<article>
		<article>
			<img src="<?php echo URL_ROOT . '/media/' . $data['img']['src'] ?>" alt="<?php echo $data['img']['alt'] ?>">
			<div>
				<h2 class="article-tite"><?php echo $data['title'] ?></h2>
				<div class="article-meta">
					<p class="article-aurthor"><?php echo $data['author'] ?></p>
					<p class="article-date"> <?php echo $data['date'] ?></p>
				</div>
				<p class="article-content">
				<?php echo $data['content'] ?>
				</p>					
			</div>
		</article>
	</article>
</main>