<?php get_header(); ?>

	<main>
		<?php
			if (!is_tax('category') && !is_tax('tag')) {
				$ps_term=get_queried_object();
				print('<h1>This is Taxonomy Term '.$ps_term->name.' from '.get_taxonomy($ps_term->taxonomy)->singular_label.' Taxonomy</h1><p>'.$ps_term->description.'</p>');
			}
		?>
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>

				<?php get_template_part( 'template-parts/content' ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>
