<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if (has_post_thumbnail() ) : ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="header-image" style="background-image: url(<?php echo $url; ?>);"></div>
	<?php endif; ?>

	<div class="container project">
		<div class="header">
			<div class="project-title"><?php the_title(); ?></div>
		</div>

		<div class="project-info">
		</div>
	
		<div class="content">
			<div><?php the_content(); ?></div>
		</div>

	</div>



<?php endwhile; ?>

<?php get_footer(); ?>
