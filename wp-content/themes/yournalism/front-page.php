<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if (has_post_thumbnail() ) : ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="header-image" style="background-image: url(<?php echo $url; ?>);"></div>
	<?php endif; ?>

	<div class="container frontpage">
		<div class="header">
			<div class="landing-title"><?php the_title(); ?></div>
		</div>

		<div class="explore">
			<span class="desc">Zoeken</span>
			<input type="text" class="explore-bar">			
		</div>

		<div class="proposals">
		<?php 
		$projects = get_posts(array( 'posts_per_page' => 3 ));
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



<?php endwhile; ?>

<?php get_footer(); ?>
