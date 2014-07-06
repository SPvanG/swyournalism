<?php get_header(); ?>

<?php if (!have_posts()) : ?>
	<div class="container">
		<div class="header">
			<div class="project-title">Pagina is niet gevonden</div>
		</div>
		<div class="content">Zoeken?</div>
	</div>
	<?php //get_search_form(); ?>
<?php endif; ?>

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
	
			<div class="social">
				<p>Deel dit met je vrienden</p>
				<p>
					<span class="icon"><i class="fa fa-fw fa-twitter"></i></span>
					<span class="icon"><i class="fa fa-fw fa-facebook"></i></span>
					<span class="icon"><i class="fa fa-fw fa-linkedin"></i></span>
					<span class="icon"><i class="fa fa-fw fa-google-plus"></i></span>
				</p>
			</div>

			<div class="section-related">
				<h2>Andere voorstellen</h2>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/author-huub.jpg)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="clearfix"></div>
			</div>

		</div>

	</div>



<?php endwhile; ?>

<?php get_footer(); ?>
