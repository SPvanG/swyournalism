<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if (has_post_thumbnail() ) : ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="header-image" style="background-image: url(<?php echo $url; ?>);"></div>
	<?php endif; ?>


	<div class="container project">
		<div class="header">
			<div class="project-type">Proposal</div>
			<div class="project-title"><?php the_title(); ?></div>
			<div class="author">
				<div class="author-image" style="background-image: url(<?php bloginfo('template_url'); ?>/images/author-huub.jpg);"></div>
				<div class="author-name">Huub Schuijn</div>
			</div>
		</div>

		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>


<?php endwhile; ?>

<?php get_footer(); ?>
