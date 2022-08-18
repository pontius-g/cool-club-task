<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>

	<h2>
		<a
			href="<?php the_permalink(); ?>"
			title="<?php the_title_attribute(); ?>">
			<?php the_title(); ?>
		</a>
	</h2>

	<div>
		<?php the_excerpt(); ?>
	</div>

</article>
