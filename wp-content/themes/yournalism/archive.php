<?php
/*
Template Name: Proposal template
*/
get_header();
?>

	<div class="header-image" style="background-image: url(<?php bloginfo('template_url'); ?>/images/header-proposals.jpg);"></div>

	<div class="container listing">
		<div class="header">
			<div class="project-title">Voorstellen</div>	
		</div>

		<div class="proposals">
		<?php 
		$projects = get_posts(array());
		if( !empty($projects) ) foreach( $projects as $project ):
			if( has_post_thumbnail($project->ID) ) $url = wp_get_attachment_url( get_post_thumbnail_id($project->ID) ); 
			else $url = '';
		?>
			<div class="proposal">
				<a href="<?php echo get_bloginfo('url') .'/'. $project->post_name; ?>">
					<div class="proposal-image" style="background-image: url(<?php echo $url; ?>);"></div>
				<?php echo $project->post_title; ?></a>
			</div>
		<?php endforeach; ?>
		</div>

		<div class="clearfix"></div>
	
	</div>

<?php get_footer(); ?>
