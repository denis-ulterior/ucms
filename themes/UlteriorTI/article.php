<?php theme_include('header'); ?>
	<section>
		<div>
		
		</div>
</section>
		<section class="content wrap" id="article-<?php echo article_id(); ?>">
		<img class='imgquadrointerno' src="<?php echo article_custom_field('img_artigo'); ?>">
			<h1 class='titulo-artigo'><?php echo article_title(); ?></h1>
			<?php echo article_html(); ?>
				<?php if (article_custom_field('video_yt')){?>
				<div class="video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo article_custom_field('video_yt'); ?>" title="YouTube" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				
				</div>
				<?php } ?>
			</article>
	
			<section class="footnote">
				<!-- Unfortunately, CSS means everything's got to be inline. -->
				<p>Esse é meu <?php echo numeral(article_number(article_id()), true); ?> artigo mais antigo.<br />Contém <?php echo count_words(article_markdown()); ?> palavras <?php if (comments_open()): ?>, e ele teve <?php echo total_comments() . pluralise(total_comments(), ' comentários'); ?> por enquanto.<?php endif; ?> <?php echo article_custom_field('attribution'); ?></p>
			</section>
		</section>
		
		<?php if (comments_open()): ?>
		<section class="comments">
			<?php if (has_comments()): ?>
			<ul class="commentlist">
				<?php $i = 0; while (comments()): $i++; ?>
				<li class="comment" id="comment-<?php echo comment_id(); ?>">
					<div class="wrap">
						<h2><?php echo comment_name(); ?></h2>
						<time><?php echo relative_time(comment_time()); ?></time>

						<div class="content">
							<?php echo comment_text(); ?>
						</div>
						<span class="counter"><?php echo $i; ?></span>
					
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
			
			<form id="comment" class="commentform wrap" method="post" action="<?php echo comment_form_url(); ?>#comment">
				<?php echo comment_form_notifications(); ?>
				<input type="text" id="nome" name="nome"/>
				<p class="name">
					<label for="name">Seu nome:</label>
					<?php echo comment_form_input_name('placeholder="Seu nome"'); ?>
				</p>

				<p class="email">
					<label for="email">Seu email:</label>
					<?php echo comment_form_input_email('placeholder="Seu email (não publicaremos)"'); ?>
				</p>

				<p class="textarea">
					<label for="text">Seu comentário:</label>
					<?php echo comment_form_input_text('placeholder="Seu comentário"'); ?>
				</p>
				
				<p class="submit">
					<?php echo comment_form_button(); ?>
				</p>
			</form>

		</section>
		<?php endif; ?>

<?php theme_include('footer'); ?>
