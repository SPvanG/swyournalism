<?php
/*
Template Name: Timeline
*/
get_header();
?>

<div class="container timeline">
	<div class="header">
		<div class="project-title">Historie van dit voorstel</div>
		<a class="backlink" href="javascript:history.back();"><i class="fa fa-chevron-circle-left"></i> Ga terug naar het voorstel</a>
	</div>

	<img class="timeline" src="<?php bloginfo('template_url'); ?>/images/timeline.png" alt="">	
</div>

<?php get_footer(); ?>
