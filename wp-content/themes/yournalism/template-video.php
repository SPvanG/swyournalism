<?php
/*
Template Name: Template with header video
*/
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="header-image">
		<iframe width="100%" height="570" src="//www.youtube.com/embed/gy7mM3ck3CA" frameborder="0" allowfullscreen></iframe>
	</div>

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
					<a class="icon" href="" target="_blank"><i class="fa fa-fw fa-twitter"></i></a>
					<a class="icon" href="" target="_blank"><i class="fa fa-fw fa-facebook"></i></a>
					<a class="icon" href="" target="_blank"><i class="fa fa-fw fa-linkedin"></i></a>
					<a class="icon" href="" target="_blank"><i class="fa fa-fw fa-google-plus"></i></a>
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
