<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if (has_post_thumbnail() ) : ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="header-image" style="background-image: url(<?php echo $url; ?>);"></div>
	<?php endif; ?>


	<div class="container project">
		<div class="header">
			<h1><?php the_title(); ?></h1>
			<div class="author"><img src="<?php bloginfo('template_url'); ?>/images/author-huub.png" alt=""></div>
		</div>

		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>


<?php endwhile; ?>

<?php get_footer(); ?>
