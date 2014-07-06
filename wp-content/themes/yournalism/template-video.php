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
		</div>

	</div>



<?php endwhile; ?>

<?php get_footer(); ?>
