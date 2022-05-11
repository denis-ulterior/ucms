<?php theme_include('header'); ?>

<h1 class="wrap">Você buscou &ldquo;<?php echo search_term(); ?>&rdquo;.</h1>

<?php if (has_search_results()): ?>
	<ul class="items">
		<?php $i = 0; while (search_results()): $i++; ?>
		<li style="background: hsl(215,28%,<?php echo round((($i / posts_per_page()) * 20) + 20); ?>%);">
			<article class="wrap">
				<h2>
					<a href="<?php echo search_item_url(); ?>" title="<?php echo search_item_title(); ?>"><?php echo search_item_title(); ?></a>
				</h2>
			</article>
		</li>
		<?php endwhile; ?>
	</ul>

	<?php if (has_search_pagination()): ?>
	<nav class="pagination">
		<div class="wrap">
			<?php echo search_prev(); ?>
			<?php echo search_next(); ?>
		</div>
	</nav>
	<?php endif; ?>

<?php else: ?>
	<p class="wrap">Infelizmente não encontramos nada para  &ldquo;<?php echo search_term(); ?>&rdquo;. Tem certeza que digitou corretamente?</p>
<?php endif; ?>

<?php theme_include('footer'); ?>