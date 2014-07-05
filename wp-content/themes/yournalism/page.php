<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if (has_post_thumbnail() ) : ?>
	<div class="header-image">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php endif; ?>


	<?php the_title(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
